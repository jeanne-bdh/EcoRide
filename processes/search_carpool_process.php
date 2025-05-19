<?php

require_once __DIR__ . "/../libs/pdo.php";
require_once __DIR__ . "/../libs/new_carpool.php";
require_once __DIR__ . "/../libs/search_carpool.php";

$errorsForm = [];

if (isset($_GET['searchCarpoolHome'])) {

    $errorsForm =  validateDate($_GET['dateDepartHome']);

    if(empty($errorsForm)) {
    $res = searchCarpool($pdo, $_GET['departCity'], $_GET['arrivalCity'], $_GET['dateDepartHome']);
    }

    if ($res) {
            header("Location: /pages/carpools/carpool_filters.php");
            exit();
        } else {
            $errorsForm[] = "Erreur recherche";
        }
}
