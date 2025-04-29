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