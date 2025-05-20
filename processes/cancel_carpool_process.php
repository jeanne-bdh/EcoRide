<?php
require_once dirname(__DIR__) . "/libs/pdo.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_carpool'])) {
    $carpoolId = (int)($_POST['id_carpool']);

    $stmt = $pdo->prepare("SELECT id_status_carpool FROM status_carpool WHERE label_status_carpool = 'Annulé'");
    $stmt->execute();
    $cancelStatus = $stmt->fetch();

    if ($cancelStatus) {
        $cancelId = $cancelStatus['id_status_carpool'];

        $updateStmt = $pdo->prepare("UPDATE carpools SET id_status_carpool = :id_status_carpool WHERE id_carpool = :id_carpool");
        $updateStmt->execute([
            'id_status_carpool' => $cancelId,
            'id_carpool' => $carpoolId
        ]);
    }

    http_response_code(200);
    exit;
}

http_response_code(400);