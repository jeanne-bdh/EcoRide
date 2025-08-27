<?php

require_once __DIR__ . "/../libs/pdo.php";
require_once __DIR__ . "/../libs/session.php";
require_once __DIR__ . "/../libs/seat.php";
require_once __DIR__ . "/../libs/price.php";
require_once __DIR__ . "/../libs/credit.php";
require_once __DIR__ . "/../libs/user.php";
require_once __DIR__ . "/../libs/participate_carpool.php";

$errorsForm = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_carpool'])) {

    $carpoolId = (int)$_POST['id_carpool'];
    $userId = $_SESSION['users']['id_users'];
    $roleInCarpool = "Passager";

    // Get profile to block driver's participation
    $userRole = getProfile($pdo, $userId);

    if ((int) $userRole['id_profil'] === 2) {
        $errorsForm[] = "Les chauffeurs ne peuvent pas participer à un covoiturage";
        return;
    }

    // If passenger haven't already participate >> Get price and remaining seat
    $userCheck = getUserCheck($pdo, $userId, $carpoolId);

    if ($userCheck->rowCount() > 0) {
        $errorsForm[] = "Vous participez déjà à ce covoiturage";
    } else {
        $carpool = [
            'price' => getPrice($pdo, $carpoolId),
            'remaining_seat' => getRemainingSeatInCarpool($pdo, $carpoolId)
        ];

        // Check remaining seat in carpool
        if (!$carpool) {
            $errorsForm[] = "Covoiturage introuvable";
        } elseif ($carpool['remaining_seat'] <= 0) {
            $errorsForm[] = "Plus de places disponibles";
        } else {

            // Check credit's passenger
            $userCredit = getUserCredit($pdo, $userId);

            if ($userCredit < $carpool['price']) {
                $errorsForm[] = "Vous n'avez pas assez de crédits pour participer";
            } else {

                $price = $carpool['price'];
                updateCreditPassenger($pdo, $userId, $price);
                insertCarpoolsUsers($pdo, $userId, $carpoolId, $roleInCarpool);
                updateRemainingSeatInCarpool($pdo, $carpoolId);

                header("Location: /pages/users/future-carpool/future_carpool.php?view=future");
                exit;
            }
        }
    }
}
