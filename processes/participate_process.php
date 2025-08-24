<?php

require_once __DIR__ . "/../libs/pdo.php";
require_once __DIR__ . "/../libs/session.php";
require_once __DIR__ . "/../libs/new_carpool.php";

$errorForm = [];

if (!isUserConnected()) {
    header("Location: /pages/auth/login_form.php");
    exit;
}

if (!isset($_POST['id_carpool'])) {
    $errorsForm[] = "Covoiturage inconnu";
}

$carpoolId = (int)$_POST['id_carpool'];
$userId = $_SESSION['users']['id_users'];
$roleInCarpool = "Passager";

$stmtUserCheck = $pdo->prepare("SELECT * FROM carpools_users WHERE id_users = :userId AND id_carpool = :carpoolId");
$stmtUserCheck->execute([
        'userId' => $userId,
        'carpoolId' => $carpoolId
    ]);

if ($stmtUserCheck->rowCount() > 0) {
    $errorsForm[] = "Vous participez déjà à ce covoiturage";
}

if (insertCarpoolsUsers($pdo, $userId, $carpoolId, $roleInCarpool)) {
    header("Location: /pages/users/future-carpool/future_carpool.php");
    exit;
} else {
    $errorsForm[] = "Impossible de participer au covoiturage";
}
