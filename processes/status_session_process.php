<?php
require_once __DIR__ . "/../libs/pdo.php";
require_once __DIR__ . "/../libs/user.php";

$users = getUserForAdmin($pdo);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_users'])) {
    $userId = (int)($_POST['id_users']);

    $status = getStatusSession($pdo, $userId);

    if ($status === 1) {
        if (userSuspension($pdo, $userId)) {
            echo "Suspendu";
        } else {
            echo "Erreur";
        }
    } elseif ($status === 2) {
        if (userRestart($pdo, $userId)) {
            echo "Actif";
        } else {
            echo "Erreur";
        }
    }
}
