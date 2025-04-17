<?php

require_once __DIR__ . "/../libs/pdo.php";
require_once __DIR__ . "/../libs/user.php";
require_once __DIR__ . "/../libs/new_carpool.php";

$errorsForm = [];
$messagesForm = [];

$userId = (int)$_SESSION['users']['id_users'];
$userCars = getCarByUser($pdo, $userId);

if (isset($_POST['saveNewCarpool'])) {
    $errorsForm = array_merge($errorsForm, validatePrice($_POST['price']), validateDuration($_POST['duration']));

    if (empty($errorsForm)) {
        $res = saveNewCarpool($pdo, $_POST['localDepart'], $_POST['localArrival'], $_POST['date'], $_POST['duration'], $_POST['timeDepart'], $_POST['timeArrival'], $_POST['price'], (int)$_SESSION['users']['id_users']);

        if ($res) {
            $messagesForm[] = "Votre voyage a été enregistré avec succès";
        } else {
            $errorsForm[] = "Erreur lors de l'enregistrement du voyage";
        }
    }
}
