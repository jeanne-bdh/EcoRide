<?php

require_once __DIR__ . "/../libs/pdo.php";
require_once __DIR__ . "/../libs/seat.php";

$userId = (int)$_SESSION['users']['id_users'];

if (isset($_POST['car-select'])) {
    $carId = (int) $_POST['car-select'];

    if (getRemainingSeat($pdo, $carId)) {
        echo "Mise à jour réussie";
    } else {
        echo "Échec de la mise à jour";
    }
} else {
    echo "Aucune voiture sélectionnée ou ID invalide.";
}
