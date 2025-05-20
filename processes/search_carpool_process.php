<?php

require_once __DIR__ . "/../libs/pdo.php";
require_once __DIR__ . "/../libs/validation_date.php";
require_once __DIR__ . "/../libs/carpool.php";

$errorsForm = [];

if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET['searchCarpool'])) {

    $errorsForm = validateDate($_GET['dateDepart']);

    if (empty($errorsForm)) {
        $res = getSearchCarpoolCard($pdo, $_GET['departCity'], $_GET['arrivalCity'], $_GET['dateDepart']);
    }

    if ($res) {
        header("Location: /pages/carpools/carpool_filters.php?departCity=" . urlencode($_GET['departCity']) .
            "&arrivalCity=" . urlencode($_GET['arrivalCity']) .
            "&dateDepart=" . urlencode($_GET['dateDepart']));
        exit();
    } else {
        $errorsForm[] = "Une erreur est survenue lors de la recherche";
    }
}