<?php
session_set_cookie_params([
    'lifetime' => 3600,
    'path' => '/',
    // 'domain' => '.ecoride.com', (en prod)
    'httponly' => true
]);

session_start();

function isUserConnected():bool
{
    return isset($_SESSION['users']);
}

function getProfile(PDO $pdo, int $userId):array
{
    $query = $pdo->prepare("SELECT id_role, id_profil FROM users WHERE id_users = :id_users");
    $query->bindValue(':id_users', $userId, PDO::PARAM_INT);
    $query->execute();

    return $query->fetch(PDO::FETCH_ASSOC);
}

function getUserSessionLink(): string
{
    $role = $_SESSION['users']['id_role'];
    return match ($role) {
        1 => '/pages/admin/admin_session.php',
        3 => '/pages/employees/employee_session.php',
        default => '/pages/users/user_session.php'
    };
}