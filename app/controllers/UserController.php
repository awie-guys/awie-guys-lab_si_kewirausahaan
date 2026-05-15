<?php

class UserController extends Controller
{
    private User $userModel;

    public function __construct()
    {
        $this->requireRole('admin');
        $this->userModel = $this->model('User');
    }

    public function index(): void
    {
        $users = $this->userModel->getAll();

        $this->view('admin/user/index', [
            'title' => 'Data User',
            'users' => $users,
            'success' => Session::flash('success'),
            'error' => Session::flash('error')
        ]);
    }

    public function create(): void
    {
        $this->view('admin/user/form', [
            'title' => 'Tambah User',
            'action' => '/admin/user/store'
        ]);
    }

    public function store(): void
    {
        $nama = trim($_POST['nama'] ?? '');
        $username = trim($_POST['username'] ?? '');
        $password = trim($_POST['password'] ?? '');

        if ($nama === '' || $username === '' || $password === '') {
            Session::flash('error', 'Semua field wajib diisi');
            $this->redirect('/admin/user/create');
        }

        if ($this->userModel->usernameExists($username)) {
            Session::flash('error', 'Username sudah digunakan');
            $this->redirect('/admin/user/create');
        }

        $this->userModel->create([
            'nama' => $nama,
            'username' => $username,
            'password' => $password,
            'status' => 'aktif'
        ]);

        Session::flash('success', 'User kasir berhasil ditambahkan');
        $this->redirect('/admin/user');
    }

    public function edit(int $id): void
    {
        $user = $this->userModel->findById($id);

        if (!$user) {
            Session::flash('error', 'User tidak ditemukan');
            $this->redirect('/admin/user');
        }
  $this->view('admin/user/form', [
            'title' => 'Edit User',
            'user' => $user,
            'action' => '/admin/user/update/' . $id
        ]);
    }

    public function update(int $id): void
    {
        $user = $this->userModel->findById($id);

        if (!$user) {
            Session::flash('error', 'User tidak ditemukan');
            $this->redirect('/admin/user');
        }

        if ($user['role'] === 'admin') {
            Session::flash('error', 'Admin utama tidak boleh diubah');
            $this->redirect('/admin/user');
        }

        $nama = trim($_POST['nama'] ?? '');
        $username = trim($_POST['username'] ?? '');
        $status = trim($_POST['status'] ?? 'aktif');

        if ($nama === '' || $username === '') {
            Session::flash('error', 'Nama dan username wajib diisi');
            $this->redirect('/admin/user/edit/' . $id);
        }

        if ($this->userModel->usernameExists($username, $id)) {
            Session::flash('error', 'Username sudah digunakan');
            $this->redirect('/admin/user/edit/' . $id);
        }

        $this->userModel->update($id, [
            'nama' => $nama,
            'username' => $username,
            'status' => $status
        ]);

        Session::flash('success', 'User berhasil diperbarui');
        $this->redirect('/admin/user');
    }

    public function resetPassword(int $id): void
    {
        $user = $this->userModel->findById($id);

        if (!$user) {
            Session::flash('error', 'User tidak ditemukan');
            $this->redirect('/admin/user');
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $password = trim($_POST['password'] ?? '');

            if ($password === '') {
                Session::flash('error', 'Password wajib diisi');
                $this->redirect('/admin/user/reset-password/' . $id);
            }
   $this->userModel->resetPassword($id, $password);

            Session::flash('success', 'Password berhasil direset');
            $this->redirect('/admin/user');
        }

        $this->view('admin/user/reset-password', [
            'title' => 'Reset Password',
            'user' => $user
        ]);
    }

    public function delete(int $id): void
    {
        $user = $this->userModel->findById($id);

        if (!$user) {
            Session::flash('error', 'User tidak ditemukan');
            $this->redirect('/admin/user');
        }

        if ($user['role'] === 'admin') {
            Session::flash('error', 'Admin tidak boleh dihapus');
            $this->redirect('/admin/user');
        }

        $this->userModel->delete($id);

        Session::flash('success', 'User berhasil dihapus');
        $this->redirect('/admin/user');
    }
}