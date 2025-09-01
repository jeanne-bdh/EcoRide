<?php

namespace App\Service;

class SessionManager
{
    public function __construct()
    {
        session_set_cookie_params([
            'lifetime' => 3600,
            'path' => '/',
            'httponly' => true
        ]);

        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function getUserId(): ?int
    {
        return $_SESSION['users']['id_users'] ?? null;
    }

    public function getUserPseudo(): ?string
    {
        return $_SESSION['users']['pseudo'] ?? null;
    }

    public function isUserConnected(): bool
    {
        return isset($_SESSION['users']);
    }

    public function getUserSessionLink(): string
    {
        if (!isset($_SESSION['users']['id_role'])) {
            return '/login';
        }

        $role = $_SESSION['users']['id_role'];
        return match ($role) {
            1 => '/admin',
            3 => '/employee',
            default => '/user'
        };
    }

    public function logout(): void
    {
        session_regenerate_id(true);
        session_destroy();
        unset($_SESSION);
        //$_SESSION = [];
    }
}
