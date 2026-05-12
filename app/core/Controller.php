<?php

class Controller
{
    protected function view(string $path, array $data = []): void
    {
        $viewPath = dirname(__DIR__) . '/views/' . trim($path, '/') . '.php';

        if (!file_exists($viewPath)) {
            throw new Exception('View tidak ditemukan: ' . $path);
        }

        extract($data, EXTR_SKIP);

        require $viewPath;
    }

    protected function redirect(string $url): void
    {
        if (preg_match('#^https?://#', $url)) {
            header('Location: ' . $url);
            exit;
        }

        $baseUrl = defined('BASE_URL') ? BASE_URL : '';

        $target = rtrim($baseUrl, '/') . '/' . ltrim($url, '/');

        header('Location: ' . $target);
        exit;
    }

    protected function model(string $modelName): object
    {
        $modelFile = dirname(__DIR__) . '/models/' . $modelName . '.php';

        if (!file_exists($modelFile)) {
            throw new Exception('Model tidak ditemukan: ' . $modelName);
        }

        require_once $modelFile;

        if (!class_exists($modelName)) {
            throw new Exception('Class model tidak ditemukan: ' . $modelName);
        }

        return new $modelName();
    }

    protected function requireLogin(): void
    {
        if (!Session::isLoggedIn()) {
            $this->redirect('/login');
        }
    }

    protected function requireRole(string|array $roles): void
    {
        $this->requireLogin();

        $user = Session::user();
        $userRole = $user['role'] ?? null;

        $allowedRoles = is_array($roles) ? $roles : [$roles];

        if (!in_array($userRole, $allowedRoles, true)) {
            $this->redirect('/403');
        }
    }

    protected function currentUser(): mixed
    {
        return Session::user();
    }
}