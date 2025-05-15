<?php
require_once dirname(__DIR__) . "/libs/pdo.php";
//require_once dirname(__DIR__) . "/libs/cancel_carpool.php";


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_carpool'])) {
    $idCarpool = intval($_POST['id_carpool']);

    // Récupère l'ID du statut "Annulé"
    $stmt = $pdo->prepare("SELECT id_status_carpool FROM status_carpool WHERE label_status_carpool = 'Annulé'");
    $stmt->execute();
    $cancelStatus = $stmt->fetch();

    if ($cancelStatus) {
        $cancelId = $cancelStatus['id_status_carpool'];

        // Met à jour le covoiturage
        $updateStmt = $pdo->prepare("UPDATE carpools SET id_status_carpool = :cancelId WHERE id_carpool = :id");
        $updateStmt->execute([
            'cancelId' => $cancelId,
            'id' => $idCarpool
        ]);
    }

    http_response_code(200);
    exit;
}

http_response_code(400);


/*
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_carpool'])) {
    $idCarpool = intval($_POST['id_carpool']);
    $idStatusCarpool = getStatusCancelCarpool($pdo);

    if ($idStatusCarpool !== null) {
        $updateCarpoolStatus = updateCarpoolStatus($pdo, $idStatusCarpool, $idCarpool);

        if ($updateCarpoolStatus) {
            http_response_code(200);
            exit;
        }
    }
}

http_response_code(400);
*/