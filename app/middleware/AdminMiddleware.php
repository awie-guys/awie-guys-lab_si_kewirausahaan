<?php

class AdminMiddleware
{
    public static function handle(): void
    {
        AuthMiddleware::handle();

        $user = Session::user();

        if (($user['role'] ?? null) !== 'admin') {
            header('Location: /403');
            exit;
        }
    }
}