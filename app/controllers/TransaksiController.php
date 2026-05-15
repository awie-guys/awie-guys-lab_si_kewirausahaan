<?php

class TransaksiController extends Controller
{
    public function adminIndex(): void
    {
        $this->requireRole(['admin', 'kasir']);

        $this->view('admin/transaksi/index', [
            'title' => 'Transaksi POS',
            'user'  => $this->currentUser(),
        ]);
    }

   public function kasirIndex(): void
    {
        $this->requireRole(['admin', 'kasir']);

        $this->view('kasir/transaksi/index', [
            'title' => 'Transaksi POS',
            'user'  => $this->currentUser(),
        ]);
    }

    public function store(): void
    {
        $this->requireRole(['admin', 'kasir']);

        $user = $this->currentUser();

        $itemsRaw    = $_POST['items'] ?? '';
        $metodeBayar = trim($_POST['metode_bayar'] ?? '');
        $nominalBayar = $_POST['nominal_bayar'] ?? 0;

        $items = [];
        if (is_string($itemsRaw)) {
            $items = json_decode($itemsRaw, true) ?? [];
        } elseif (is_array($itemsRaw)) {
            $items = $itemsRaw;
        }

        if (empty($items)) {
            Session::flash('error', 'Keranjang belanja kosong.');
            $this->redirectBack($user['role']);
            return;
        }

        $metodeBayarValid = ['cash', 'transfer', 'qris', 'ewallet'];
        if (!in_array($metodeBayar, $metodeBayarValid, true)) {
            Session::flash('error', 'Metode pembayaran tidak valid.');
            $this->redirectBack($user['role']);
            return;
        }

        /** @var Barang $barangModel */
        $barangModel = $this->model('Barang');

        $keranjang  = [];
        $totalJual  = 0;
        $totalBeli  = 0;

        foreach ($items as $item) {
            $idBarang = (int) ($item['id_barang'] ?? 0);
            $qty      = (int) ($item['qty'] ?? 0);

            if ($idBarang <= 0 || $qty <= 0) {
                Session::flash('error', 'Data item tidak valid.');
                $this->redirectBack($user['role']);
                return;
            }

            $barang = $barangModel->findById($idBarang);

            if (!$barang) {
                Session::flash('error', 'Barang dengan ID ' . $idBarang . ' tidak ditemukan.');
                $this->redirectBack($user['role']);
                return;
            }

            if ($barang['stok'] < $qty) {
                Session::flash('error', 'Stok ' . $barang['nama'] . ' tidak cukup. Stok tersedia: ' . $barang['stok']);
                $this->redirectBack($user['role']);
                return;
            }

            $hargaJual    = (float) $barang['harga_jual'];
            $hargaBeli    = (float) ($barang['harga_beli'] ?? 0);
            $subtotalJual = $hargaJual * $qty;
            $subtotalBeli = $hargaBeli * $qty;
            $labaItem     = $subtotalJual - $subtotalBeli;

            $keranjang[] = [
                'id_barang'     => $idBarang,
                'nama_barang'   => $barang['nama'],
                'qty'           => $qty,
                'harga_jual'    => $hargaJual,
                'harga_beli'    => $hargaBeli,
                'subtotal_jual' => $subtotalJual,
                'subtotal_beli' => $subtotalBeli,
                'laba_item'     => $labaItem,
            ];

            $totalJual += $subtotalJual;
            $totalBeli += $subtotalBeli;
        }

        $totalLaba = $totalJual - $totalBeli;

       $nominalBayar = (float) $nominalBayar;
        $kembalian    = 0;

        if ($metodeBayar === 'cash') {
            if ($nominalBayar < $totalJual) {
                Session::flash('error', 'Nominal bayar kurang. Total: Rp ' . number_format($totalJual, 0, ',', '.'));
                $this->redirectBack($user['role']);
                return;
            }
            $kembalian = $nominalBayar - $totalJual;
        } else {
            $nominalBayar = $totalJual;
            $kembalian    = 0;
        }

        try {
            /** @var Transaksi $transaksiModel */
            $transaksiModel = $this->model('Transaksi');

            $transaksiModel->getDb()->beginTransaction();

            $kodeTranaksi = $this->generateKodeTransaksi();

           $idTransaksi = $transaksiModel->create([
                'kode_transaksi' => $kodeTranaksi,
                'id_user'        => $user['id'],
                'tanggal'        => date('Y-m-d H:i:s'),
                'total_jual'     => $totalJual,
                'total_beli'     => $totalBeli,
                'total_laba'     => $totalLaba,
                'metode_bayar'   => $metodeBayar,
                'nominal_bayar'  => $nominalBayar,
                'kembalian'      => $kembalian,
            ]);

            /** @var DetailTransaksi $detailModel */
            $detailModel = $this->model('DetailTransaksi');

            foreach ($keranjang as $item) {
                $detailModel->create([
                    'id_transaksi'  => $idTransaksi,
                    'id_barang'     => $item['id_barang'],
                    'qty'           => $item['qty'],
                    'harga_jual'    => $item['harga_jual'],
                    'harga_beli'    => $item['harga_beli'],
                    'subtotal_jual' => $item['subtotal_jual'],
                    'subtotal_beli' => $item['subtotal_beli'],
                    'laba_item'     => $item['laba_item'],
                ]);
            $barangModel->decreaseStock($item['id_barang'], $item['qty']);
            }

            $transaksiModel->getDb()->commit();
            $role = $user['role'];
            $this->redirect('/' . $role . '/transaksi/struk/' . $idTransaksi);

        } catch (Exception $e) {
            $transaksiModel->getDb()->rollBack();
            Session::flash('error', 'Gagal menyimpan transaksi: ' . $e->getMessage());
            $this->redirectBack($user['role']);
        }
    }

   public function struk(int $id): void
    {
        $this->requireRole(['admin', 'kasir']);

        /** @var Transaksi $transaksiModel */
        $transaksiModel = $this->model('Transaksi');

        $transaksi = $transaksiModel->findById($id);

        if (!$transaksi) {
            $this->redirect('/404');
            return;
        }

        /** @var DetailTransaksi $detailModel */
        $detailModel = $this->model('DetailTransaksi');
        $details     = $detailModel->getByTransaksiId($id);

        $user = $this->currentUser();
        $role = $user['role'];

        $this->view($role . '/transaksi/struk', [
            'title'     => 'Struk Transaksi',
            'transaksi' => $transaksi,
            'details'   => $details,
        ]);
    }

    private function redirectBack(string $role): void
    {
        if ($role === 'kasir') {
            $this->redirect('/kasir/transaksi');
        } else {
            $this->redirect('/admin/transaksi');
        }
    }

   private function generateKodeTransaksi(): string
    {
        return 'TRX-' . date('Ymd') . '-' . strtoupper(substr(uniqid(), -6));
    }
}
