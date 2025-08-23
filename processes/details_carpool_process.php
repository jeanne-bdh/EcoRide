<?php

$errorsDetails = [];

if (isset($_GET["id_carpool"])) {
    $carpoolId = (int)$_GET["id_carpool"];
    $carpool = getCarpoolDetails($pdo, (int) $carpoolId);
    $averageNotes = getAverageNotes($pdo, $carpool['id_users']);
    $reviews = getReviews($pdo, $carpoolId);

    if (!$carpool) {
        $errorsDetails[] = "Impossible d'afficher le détail du covoiturage";
    }
} else {
    $errorsDetails[] = "Aucun covoiturage sélectionné";
}