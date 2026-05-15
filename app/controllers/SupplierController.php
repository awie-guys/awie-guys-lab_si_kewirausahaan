<?php

class SupplierController extends Controller {

    public function index() {
        $supplierModel = $this->model('Supplier');
        $data['supplier'] = $supplierModel->getAll();
        
        $this->view('admin/supplier/index', $data);
    }

    public function create() {
        $this->view('admin/supplier/form');
    }

    public function store() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nama = trim($_POST['nama'] ?? '');
            $kontak_person = trim($_POST['kontak_person'] ?? '') ?: null;
            $no_hp = trim($_POST['no_hp'] ?? '') ?: null;
            $alamat = trim($_POST['alamat'] ?? '') ?: null;
            $keterangan = trim($_POST['keterangan'] ?? '') ?: null;
            $status = $_POST['status'] ?? 'aktif';

            if (empty($nama)) {
                Session::setFlash('error', 'Nama supplier wajib diisi.');
                $this->redirect('/admin/supplier/create');
                return;
            }

            $supplierModel = $this->model('Supplier');
            $supplierModel->insert([
                'nama' => $nama,
                'kontak_person' => $kontak_person,
                'no_hp' => $no_hp,
                'alamat' => $alamat,
                'keterangan' => $keterangan,
                'status' => $status
            ]);

            Session::setFlash('success', 'Supplier berhasil ditambahkan.');
            $this->redirect('/admin/supplier');
        }
    }

    public function edit($id) {
        $supplierModel = $this->model('Supplier');
        $data['supplier'] = $supplierModel->getById($id);

        if (!$data['supplier']) {
            Session::setFlash('error', 'Data supplier tidak ditemukan.');
            $this->redirect('/admin/supplier');
            return;
        }

        $this->view('admin/supplier/form', $data);
    }

    public function update($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nama = trim($_POST['nama'] ?? '');
            $kontak_person = trim($_POST['kontak_person'] ?? '') ?: null;
            $no_hp = trim($_POST['no_hp'] ?? '') ?: null;
            $alamat = trim($_POST['alamat'] ?? '') ?: null;
            $keterangan = trim($_POST['keterangan'] ?? '') ?: null;
            $status = $_POST['status'] ?? 'aktif';

            if (empty($nama)) {
                Session::setFlash('error', 'Nama supplier wajib diisi.');
                $this->redirect('/admin/supplier/edit/' . $id);
                return;
            }

            $supplierModel = $this->model('Supplier');
            
            $supplierLama = $supplierModel->getById($id);
            if (!$supplierLama) {
                Session::setFlash('error', 'Data supplier tidak ditemukan.');
                $this->redirect('/admin/supplier');
                return;
            }

            $supplierModel->update($id, [
                'nama' => $nama,
                'kontak_person' => $kontak_person,
                'no_hp' => $no_hp,
                'alamat' => $alamat,
                'keterangan' => $keterangan,
                'status' => $status
            ]);

            Session::setFlash('success', 'Supplier berhasil diperbarui.');
            $this->redirect('/admin/supplier');
        }
    }

    public function delete($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $supplierModel = $this->model('Supplier');
            
            $supplier = $supplierModel->getById($id);
            if (!$supplier) {
                Session::setFlash('error', 'Data supplier tidak ditemukan.');
                $this->redirect('/admin/supplier');
                return;
            }

            if ($supplierModel->hasRestock($id)) {
                // Nonaktifkan jika sudah punya riwayat restock
                $supplierModel->update($id, array_merge($supplier, ['status' => 'nonaktif']));
                Session::setFlash('success', 'Supplier dinonaktifkan karena memiliki riwayat restock.');
                $this->redirect('/admin/supplier');
                return;
            }

            $supplierModel->delete($id);
            Session::setFlash('success', 'Supplier berhasil dihapus permanen.');
            $this->redirect('/admin/supplier');
        }
    }
}