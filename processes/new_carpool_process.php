<?php

require_once __DIR__ . "/../libs/pdo.php";
require_once __DIR__ . "/../libs/user.php";
require_once __DIR__ . "/../libs/new_carpool.php";
require_once __DIR__ . "/../libs/seat.php";

$errorsForm = [];
$messagesForm = [];

$userId = (int)$_SESSION['users']['id_users'];
$userCars = getCarByUser($pdo, $userId);

if (isset($_POST['saveNewCarpool'])) {
    $errorsForm = array_merge($errorsForm, validatePrice($_POST['price']), validateDuration($_POST['duration']));

    if (empty($errorsForm)) {
        if (isset($_POST['car-select'])) {
            $carId = (int) $_POST['car-select'];
            $carpoolId = saveNewCarpool($pdo, $_POST['localDepart'], $_POST['localArrival'], $_POST['date'], $_POST['duration'], $_POST['timeDepart'], $_POST['timeArrival'], $_POST['price'], $userId, $carId);

            if ($carpoolId) {
                getRemainingSeat($pdo, $carpoolId, $carId);
                $messagesForm[] = "Votre voyage a été enregistré avec succès";
            } else {
                $errorsForm[] = "Erreur lors de l'enregistrement du voyage";
            }
        }
    } else {
        $errorsForm[] = "Aucun véhicule sélectionné";
    }
}
