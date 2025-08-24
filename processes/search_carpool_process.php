<?php

require_once __DIR__ . "/../libs/pdo.php";
require_once __DIR__ . "/../libs/validation_date.php";
require_once __DIR__ . "/../libs/carpool.php";

$errorsForm = [];

if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET['searchCarpool'])) {

    $cityDepart = trim($_GET['departCity']);
    $cityArrival = trim($_GET['arrivalCity']);
    $dateDepart = $_GET['dateDepart'] ?? '';
    $errorsForm = validateDate($_GET['dateDepart']);

    if (empty($errorsForm) && !empty($cityDepart) && !empty($cityArrival)) {
        $carpoolSearch = getSearchCarpoolCard($pdo, $cityDepart, $cityArrival, $dateDepart);

        if (!$carpoolSearch) {
            $errorsForm[] = "Aucun covoiturage disponible";
            http_response_code(404);
        }
    } else {
        $errorsForm[] = "Veuillez renseigner tous les champs";
        http_response_code(400);
    }
} else {
    http_response_code(200);
}
