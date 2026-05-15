<?php

class BarangController extends Controller {

    public function index() {
        $barangModel = $this->model('Barang');
        $data['barang'] = $barangModel->getAll();
        
        $this->view('admin/barang/index', $data);
    }

    public function detail($id) {
        $barangModel = $this->model('Barang');
        $data['barang'] = $barangModel->findById($id);

        if (!$data['barang']) {
            Session::setFlash('error', 'Data barang tidak ditemukan.');
            $this->redirect('/admin/barang');
            return;
        }

        $this->view('admin/barang/detail', $data);
    }

    public function create() {
        $kategoriModel = $this->model('Kategori');
        $data['kategori'] = $kategoriModel->getAll();
        
        $this->view('admin/barang/form', $data);
    }

    public function store() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $kode_barang = trim($_POST['kode_barang'] ?? '');
            $nama = trim($_POST['nama'] ?? '');
            $barcode = trim($_POST['barcode'] ?? '') ?: null; // Jika kosong set null
            $id_kategori = $_POST['id_kategori'] ?? '';
            $satuan = trim($_POST['satuan'] ?? 'pcs');
            $harga_jual = $_POST['harga_jual'] ?? 0;
            $stok_minimum = $_POST['stok_minimum'] ?? 5;
            $status = $_POST['status'] ?? 'aktif';

            // Validasi Input
            if (empty($kode_barang) || empty($nama) || empty($id_kategori) || $harga_jual === '') {
                Session::setFlash('error', 'Kode barang, nama, kategori, dan harga jual wajib diisi.');
                $this->redirect('/admin/barang/create');
                return;
            }

            $barangModel = $this->model('Barang');

            // Cek duplikasi kode barang
            if ($barangModel->checkDuplicate('kode_barang', $kode_barang)) {
                Session::setFlash('error', 'Kode Barang sudah digunakan. Gunakan kode lain.');
                $this->redirect('/admin/barang/create');
                return;
            }

            // Cek duplikasi barcode (jika diisi)
            if ($barcode && $barangModel->checkDuplicate('barcode', $barcode)) {
                Session::setFlash('error', 'Barcode sudah terdaftar pada barang lain.');
                $this->redirect('/admin/barang/create');
                return;
            }

            $barangModel->insert([
                'kode_barang' => $kode_barang,
                'nama' => $nama,
                'barcode' => $barcode,
                'id_kategori' => $id_kategori,
                'satuan' => $satuan,
                'harga_jual' => $harga_jual,
                'stok_minimum' => $stok_minimum,
                'status' => $status
            ]);

            Session::setFlash('success', 'Barang berhasil ditambahkan.');
            $this->redirect('/admin/barang');
        }
    }

    public function edit($id) {
        $barangModel = $this->model('Barang');
        $kategoriModel = $this->model('Kategori');
        
        $data['barang'] = $barangModel->findById($id);
        $data['kategori'] = $kategoriModel->getAll();

        if (!$data['barang']) {
            Session::setFlash('error', 'Data barang tidak ditemukan.');
            $this->redirect('/admin/barang');
            return;
        }

        $this->view('admin/barang/form', $data);
    }

    public function update($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $kode_barang = trim($_POST['kode_barang'] ?? '');
            $nama = trim($_POST['nama'] ?? '');
            $barcode = trim($_POST['barcode'] ?? '') ?: null;
            $id_kategori = $_POST['id_kategori'] ?? '';
            $satuan = trim($_POST['satuan'] ?? 'pcs');
            $harga_jual = $_POST['harga_jual'] ?? 0;
            $stok_minimum = $_POST['stok_minimum'] ?? 5;
            $status = $_POST['status'] ?? 'aktif';

            // Validasi Input
            if (empty($kode_barang) || empty($nama) || empty($id_kategori) || $harga_jual === '') {
                Session::setFlash('error', 'Kode barang, nama, kategori, dan harga jual wajib diisi.');
                $this->redirect('/admin/barang/edit/' . $id);
                return;
            }

            $barangModel = $this->model('Barang');

            // Cek barang eksis
            $barangLama = $barangModel->findById($id);
            if (!$barangLama) {
                Session::setFlash('error', 'Data barang tidak ditemukan.');
                $this->redirect('/admin/barang');
                return;
            }

            // Cek duplikasi jika mengubah kode barang
            if ($kode_barang !== $barangLama['kode_barang'] && $barangModel->checkDuplicate('kode_barang', $kode_barang, $id)) {
                Session::setFlash('error', 'Kode Barang sudah digunakan.');
                $this->redirect('/admin/barang/edit/' . $id);
                return;
            }

            // Cek duplikasi jika mengubah barcode
            if ($barcode && $barcode !== $barangLama['barcode'] && $barangModel->checkDuplicate('barcode', $barcode, $id)) {
                Session::setFlash('error', 'Barcode sudah terdaftar pada barang lain.');
                $this->redirect('/admin/barang/edit/' . $id);
                return;
            }

            $barangModel->update($id, [
                'kode_barang' => $kode_barang,
                'nama' => $nama,
                'barcode' => $barcode,
                'id_kategori' => $id_kategori,
                'satuan' => $satuan,
                'harga_jual' => $harga_jual,
                'stok_minimum' => $stok_minimum,
                'status' => $status
            ]);

            Session::setFlash('success', 'Barang berhasil diperbarui.');
            $this->redirect('/admin/barang');
        }
    }

    public function delete($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $barangModel = $this->model('Barang');
            
            $barang = $barangModel->findById($id);
            if (!$barang) {
                Session::setFlash('error', 'Data barang tidak ditemukan.');
                $this->redirect('/admin/barang');
                return;
            }

            // Validasi jika barang sudah dipakai di transaksi/restock tidak bisa dihapus permanen
            if ($barangModel->hasTransactions($id)) {
                // Alternatif aman: Ubah status ke nonaktif
                $barangModel->update($id, array_merge($barang, ['status' => 'nonaktif']));
                Session::setFlash('success', 'Barang di-nonaktifkan karena memiliki riwayat transaksi/restock.');
                $this->redirect('/admin/barang');
                return;
            }

            // Hapus fisik jika benar-benar belum dipakai transaksi 
            $barangModel->delete($id);
            Session::setFlash('success', 'Barang berhasil dihapus permanen.');
            $this->redirect('/admin/barang');
        }
    }
}