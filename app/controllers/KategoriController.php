<?php

class KategoriController extends Controller {

    public function index() {
        $kategoriModel = $this->model('Kategori');
        $data['kategori'] = $kategoriModel->getAll();
        
        $this->view('admin/kategori/index', $data);
    }

    public function create() {
        $this->view('admin/kategori/form');
    }

    public function store() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nama = trim($_POST['nama'] ?? '');
            $deskripsi = trim($_POST['deskripsi'] ?? '');

            // Validasi nama kategori wajib diisi
            if (empty($nama)) {
                Session::setFlash('error', 'Nama kategori wajib diisi.');
                $this->redirect('/admin/kategori/create');
                return;
            }

            $kategoriModel = $this->model('Kategori');
            $kategoriModel->insert([
                'nama' => $nama,
                'deskripsi' => $deskripsi
            ]);

            Session::setFlash('success', 'Kategori berhasil ditambahkan.');
            $this->redirect('/admin/kategori');
        }
    }

    public function edit($id) {
        $kategoriModel = $this->model('Kategori');
        $data['kategori'] = $kategoriModel->getById($id);

        if (!$data['kategori']) {
            Session::setFlash('error', 'Data kategori tidak ditemukan.');
            $this->redirect('/admin/kategori');
            return;
        }

        $this->view('admin/kategori/form', $data);
    }

    public function update($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nama = trim($_POST['nama'] ?? '');
            $deskripsi = trim($_POST['deskripsi'] ?? '');

            // Validasi nama kategori wajib diisi
            if (empty($nama)) {
                Session::setFlash('error', 'Nama kategori wajib diisi.');
                $this->redirect('/admin/kategori/edit/' . $id);
                return;
            }

            $kategoriModel = $this->model('Kategori');
            
            // Pastikan kategori yang akan diupdate ada di database
            $kategori = $kategoriModel->getById($id);
            if (!$kategori) {
                Session::setFlash('error', 'Data kategori tidak ditemukan.');
                $this->redirect('/admin/kategori');
                return;
            }

            $kategoriModel->update($id, [
                'nama' => $nama,
                'deskripsi' => $deskripsi
            ]);

            Session::setFlash('success', 'Kategori berhasil diperbarui.');
            $this->redirect('/admin/kategori');
        }
    }

    public function delete($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $kategoriModel = $this->model('Kategori');
            
            $kategori = $kategoriModel->getById($id);
            if (!$kategori) {
                Session::setFlash('error', 'Data kategori tidak ditemukan.');
                $this->redirect('/admin/kategori');
                return;
            }

            // Jangan hapus kategori sembarangan jika masih dipakai barang
            if ($kategoriModel->isUsedByBarang($id)) {
                Session::setFlash('error', 'Gagal dihapus! Kategori ini masih digunakan oleh master barang.');
                $this->redirect('/admin/kategori');
                return;
            }

            $kategoriModel->delete($id);
            Session::setFlash('success', 'Kategori berhasil dihapus permanen.');
            $this->redirect('/admin/kategori');
        }
    }
}