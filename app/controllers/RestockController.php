<?php

class RestockController extends Controller
{
    public function index(): void
    {
        $this->requireRole('admin');

        /** @var Restock $restockModel */
        $restockModel = $this->model('Restock');

        $restocks = $restockModel->getAll();

        $this->view('admin/restock/index', [
            'title'    => 'Riwayat Restock',
            'restocks' => $restocks,
        ]);
    }

    public function create(): void
    {
        $this->requireRole('admin');

      /**  @var Barang $barangModel */
        $barangModel = $this->model('Barang');

        /** @var Supplier $supplierModel */
        $supplierModel = $this->model('Supplier');

        $barangs   = $barangModel->findActive();
        $suppliers = $supplierModel->findActive();

        $this->view('admin/restock/form', [
            'title'     => 'Tambah Restock',
            'barangs'   => $barangs,
            'suppliers' => $suppliers,
            'error'     => Session::flash('error'),
            'old'       => Session::flash('old') ?? [],
        ]);
    }
    public function store(): void
    {
        $this->requireRole('admin');

        $user = $this->currentUser();

        $idBarang      = trim($_POST['id_barang'] ?? '');
        $idSupplier    = trim($_POST['id_supplier'] ?? '');
        $qty           = $_POST['qty'] ?? '';
        $hargaBeli     = $_POST['harga_beli'] ?? '';
        $hargaJualBaru = trim($_POST['harga_jual_baru'] ?? '');
        $tanggal       = trim($_POST['tanggal'] ?? date('Y-m-d'));
        $catatan       = trim($_POST['catatan'] ?? '');

        $errors = $this->validateRestockInput($idBarang, $idSupplier, $qty, $hargaBeli);

        if (!empty($errors)) {
            Session::flash('error', implode('<br>', $errors));
            Session::flash('old', $_POST);
            $this->redirect('/admin/restock/create');
            return;
        }

        $qty       = (int) $qty;
        $hargaBeli = (float) $hargaBeli;

        /** @var Barang $barangModel */
        $barangModel = $this->model('Barang');
        $barang = $barangModel->findById((int) $idBarang);

        if (!$barang) {
            Session::flash('error', 'Barang tidak ditemukan.');
            Session::flash('old', $_POST);
            $this->redirect('/admin/restock/create');
            return;
        }

        /** @var Supplier $supplierModel */
        $supplierModel = $this->model('Supplier');
        $supplier = $supplierModel->findById((int) $idSupplier);

        if (!$supplier) {
            Session::flash('error', 'Supplier tidak ditemukan.');
            Session::flash('old', $_POST);
            $this->redirect('/admin/restock/create');
            return;
        }

        $hargaJualBaruFinal = null;
        if ($hargaJualBaru !== '') {
            if (!is_numeric($hargaJualBaru) || (float) $hargaJualBaru <= 0) {
                Session::flash('error', 'Harga jual baru harus angka lebih dari 0 jika diisi.');
                Session::flash('old', $_POST);
                $this->redirect('/admin/restock/create');
                return;
            }
            $hargaJualBaruFinal = (float) $hargaJualBaru;
        }

        $totalNilai = $qty * $hargaBeli;

        try {
            $this->db()->beginTransaction();

            /** @var Restock $restockModel */
            $restockModel = $this->model('Restock');

            $restockModel->create([
                'tanggal'        => $tanggal,
                'id_barang'      => (int) $idBarang,
                'id_supplier'    => (int) $idSupplier,
                'id_user'        => $user['id'],
                'qty'            => $qty,
                'harga_beli'     => $hargaBeli,
                'harga_jual_baru'=> $hargaJualBaruFinal,
                'total_nilai'    => $totalNilai,
                'catatan'        => $catatan ?: null,
            ]);

            $barangModel->increaseStock((int) $idBarang, $qty);

            if ($hargaJualBaruFinal !== null) {
                $barangModel->updateHargaJual((int) $idBarang, $hargaJualBaruFinal);
            }

            $this->db()->commit();

            Session::flash('success', 'Restock berhasil disimpan.');
            $this->redirect('/admin/restock');
        } catch (Exception $e) {
            $this->db()->rollBack();
            Session::flash('error', 'Gagal menyimpan restock: ' . $e->getMessage());
            Session::flash('old', $_POST);
            $this->redirect('/admin/restock/create');
        }
    }

    private function validateRestockInput(
        string $idBarang,
        string $idSupplier,
        mixed $qty,
        mixed $hargaBeli
    ): array {
        $errors = [];

        if ($idBarang === '') {
            $errors[] = 'Barang wajib dipilih.';
        }

        if ($idSupplier === '') {
            $errors[] = 'Supplier wajib dipilih.';
        }

        if (!is_numeric($qty) || (int) $qty <= 0) {
            $errors[] = 'Qty harus angka dan lebih dari 0.';
        }

        if (!is_numeric($hargaBeli) || (float) $hargaBeli <= 0) {
            $errors[] = 'Harga beli harus angka dan lebih dari 0.';
        }

        return $errors;
    }

    private function db(): PDO
    {
        $model = $this->model('Restock');
        return $model->getDb();
    }
}