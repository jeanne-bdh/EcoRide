<?php
require_once __DIR__ . "/../libs/pdo.php";
require_once __DIR__ . "/../libs/user.php";

$users = getUserForAdmin($pdo);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_users'])) {
    $userId = (int)($_POST['id_users']);

    $status = getStatusSession($pdo, $userId);

    if ($status === 1) {
        if (userSuspension($pdo, $userId)) {
            http_response_code(200);
            echo "Suspendu";
        } else {
            http_response_code(500);
            echo "Erreur";
        }
    } elseif ($status === 2) {
        if (userRestart($pdo, $userId)) {
            http_response_code(200);
            echo "Actif";
        } else {
            http_response_code(500);
            echo "Erreur";
        }
    } else {
        http_response_code(400);
        echo "Statut de session invalide";
    }
}
