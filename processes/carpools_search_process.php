<?php

require_once __DIR__ . "/../libs/pdo.php";
require_once __DIR__ . "/../libs/new_carpool.php";

$errorsForm = [];

if (isset($_GET['searchCarpoolHome'])) {

    $errorsForm =  validateDate($_GET['date']);
    $res = searchCarpool($pdo, $_GET['localDepart'], $_GET['localArrival'], $_GET['date']);
}
