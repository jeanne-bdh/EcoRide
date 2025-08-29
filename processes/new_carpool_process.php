<?php

require_once APP_ROOT . "/../libs/pdo.php";
require_once APP_ROOT . "/../libs/user.php";
require_once APP_ROOT . "/../libs/new_carpool.php";
require_once APP_ROOT . "/../libs/duration.php";
require_once APP_ROOT . "/../libs/validation_date.php";
require_once APP_ROOT . "/../libs/seat.php";

$errorsForm = [];
$messagesForm = [];

$userId = (int)$_SESSION['users']['id_users'];
$userCars = getCarByUser($pdo, $userId);

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['saveNewCarpool'])) {

    if (!isset($_POST['car-select']) || empty($_POST['car-select'])) {
        $errorsForm[] = "Aucun véhicule sélectionné";
    }

    $errorsForm = array_merge($errorsForm, validatePrice($_POST['price']), validateDuration(), validateDate($_POST['date']));

    if (empty($errorsForm)) {
        $carId = (int) $_POST['car-select'];
        $carpoolId = saveNewCarpool($pdo, $_POST['localDepart'], $_POST['localArrival'], $_POST['date'], $_POST['timeDepart'], $_POST['timeArrival'], $_POST['price'], $userId, $carId);

        if ($carpoolId) {
            getRemainingSeat($pdo, $carpoolId, $carId);

            $insertDriver = insertCarpoolsUsers($pdo, $userId, $carpoolId, 'Chauffeur', 'Confirmé');

            if ($insertDriver) {
                $messagesForm[] = "Votre voyage a été enregistré avec succès";
            } else {
                $errorsForm[] = "Erreur lors de l'enregistrement du voyage";
            }
        }
    }
}