<?php

class KasirMiddleware
{
    public static function handle(): void
    {
        AuthMiddleware::handle();

        $user = Session::user();
        $role = $user['role'] ?? null;

        if (!in_array($role, ['admin', 'kasir'], true)) {
            header('Location: /403');
            exit;
        }
    }
}