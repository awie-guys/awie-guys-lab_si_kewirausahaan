<?php

class AuthController extends Controller
{
    private User $userModel;

    public function __construct()
    {
        $this->userModel = $this->model('User');
    }

    public function index(): void
    {
        if (Session::isLoggedIn()) {
            $this->redirectByRole(Session::user()['role']);
        }

        $this->view('auth/login', [
            'title' => 'Login',
            'error' => Session::flash('error')
        ]);
    }

    public function login(): void
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('/login');
        }

        $username = trim($_POST['username'] ?? '');
        $password = trim($_POST['password'] ?? '');

        if ($username === '' || $password === '') {
            Session::flash('error', 'Username dan password wajib diisi');
            $this->redirect('/login');
        }
  $user = $this->userModel->findByUsername($username);

        if (!$user) {
            Session::flash('error', 'Username atau password salah');
            $this->redirect('/login');
        }

        if (($user['status'] ?? 'aktif') !== 'aktif') {
            Session::flash('error', 'Akun tidak aktif');
            $this->redirect('/login');
        }

        if (!password_verify($password, $user['password'])) {
            Session::flash('error', 'Username atau password salah');
            $this->redirect('/login');
        }

        unset($user['password']);

        Session::set('user', $user);

        $this->redirectByRole($user['role']);
    }

    public function logout(): void
    {
        Session::destroy();
        $this->redirect('/login');
    }

    private function redirectByRole(string $role): void
    {
        if ($role === 'admin') {
            $this->redirect('/admin/dashboard');
        }

        if ($role === 'kasir') {
            $this->redirect('/kasir/dashboard');
        }

        $this->redirect('/login');
    }
}