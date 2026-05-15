<?php

class AuthMiddleware
{
    public static function handle(): void
    {
        if (!Session::isLoggedIn()) {
            header('Location: /login');
            exit;
        }
    }
}