<?php

require_once dirname(__DIR__) . "/libs/pdo.php";
require_once dirname(__DIR__) . "/libs/session.php";
require_once dirname(__DIR__) . "/libs/end_carpool.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_carpool'])) {
    $carpoolId = (int) $_POST['id_carpool'];
    $userId = $_SESSION['users']['id_users'];

    $userCarpool = getRoleInCarpool($pdo, $carpoolId, $userId);

    if (!$userCarpool) {
        http_response_code(403);
        echo "Accès refusé";
        exit;
    }

    if ($userCarpool['role_in_carpool'] === 'Passager') {

        updateEndStatusPassenger($pdo, $carpoolId, $userId);
        
        $carpool = getPriceAndDriver($pdo, $carpoolId);

        $price = $carpool['price'];
        $driverId = $carpool['id_users'];
        updateCreditDriver($pdo, $driverId, $price);

        $remainingPassenger = countPassengerNotArrived($pdo, $carpoolId);

        if ($remainingPassenger == 0) {
            updateEndCarpool($pdo, $carpoolId);
            updateEndStatusDriver($pdo, $carpoolId);
        }

        http_response_code(200);
        echo "Arrivés à destination";
        exit;
    }

    if ($userCarpool['role_in_carpool'] === 'Chauffeur') {
        http_response_code(200);
        exit;
    }
}
