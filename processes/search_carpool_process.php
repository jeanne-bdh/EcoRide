<?php

require_once APP_ROOT . "/../libs/pdo.php";
require_once APP_ROOT . "/../libs/validation_date.php";
require_once APP_ROOT . "/../libs/carpool.php";

$errorsForm = [];

if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET['searchCarpool'])) {

    $cityDepart = trim($_GET['departCity']);
    $cityArrival = trim($_GET['arrivalCity']);
    $dateDepart = $_GET['dateDepart'];
    $errorDate = validateDate($dateDepart);

    if (empty($errorDate)) {
        $res = getSearchCarpoolCard($pdo, $cityDepart, $cityArrival, $dateDepart);
    }

    if ($res) {
        header("Location: /pages/carpools/carpool_search.php?departCity=" . urlencode($cityDepart) .
            "&arrivalCity=" . urlencode($cityArrival) .
            "&dateDepart=" . urlencode($_GET['dateDepart']));
        exit();
    } else {
        $errorsForm[] = "Aucun covoiturage disponible";
    }
}