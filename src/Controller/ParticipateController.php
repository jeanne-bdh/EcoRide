<?php

namespace App\Controller;

use App\Repository\CarpoolsRepository;
use App\Repository\CarpoolsUsersRepository;
use App\Repository\NewCarpoolRepository;
use App\Repository\UsersRepository;

class ParticipateController extends Controller
{
    public function participate(): void
    {
        $errors = [];
        $carpoolsUsersRepository = new CarpoolsUsersRepository();
        $userRepository = new UsersRepository();
        $carpoolRepository = new CarpoolsRepository();
        $newCarpoolRepository = new NewCarpoolRepository();

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_carpool'])) {

            $carpoolId = (int)$_POST['id_carpool'];
            $userId = $_SESSION['users']['id_users'];
            $roleInCarpool = "Passager";
            $statusInCarpool = "Confirmé";

            $carpool = $carpoolRepository->getCarpoolDetails($carpoolId);

            // Check carpool exists
            if (!$carpool) {
                $errors[] = "Covoiturage introuvable";
                $this->render("pages/carpools/carpool_details", [
                    "carpool" => null,
                    "errors"  => $errors
                ]);
                return;
            }

            // Get profile to block driver's participation
            $userProfile = $userRepository->getProfile($userId);

            if ((int) $userProfile['id_profil'] === 2) {
                $errors[] = "Les chauffeurs ne peuvent pas participer à un covoiturage";
                $this->render("pages/carpools/carpool_details", [
                    "carpool" => $carpool,
                    "errors" => $errors
                ]);
                return;
            }

            // Check passenger haven't already participate
            $userCheck = $carpoolsUsersRepository->getUserCheck($userId, $carpoolId);
            if ($userCheck->rowCount() > 0) {
                $errors[] = "Vous participez déjà à ce covoiturage";
                $this->render("pages/carpools/carpool_details", [
                    "carpool" => $carpool,
                    "errors" => $errors
                ]);
                return;
            }

            // Check remaining seat
            $remainingSeat = $carpool->getRemainingSeat();
            if ($remainingSeat <= 0) {
                $errors[] = "Plus de places disponibles";
                $this->render("pages/carpools/carpool_details", [
                    "carpool" => $carpool,
                    "errors"  => $errors
                ]);
                return;
            }

            // Check credit's passenger
            $price = $carpool->getPrice();
            $userCredit = $userRepository->getUserCredit($userId);

            if ($userCredit < $price) {
                $errors[] = "Vous n'avez pas assez de crédits pour participer";
                $this->render("pages/carpools/carpool_details", [
                    "carpool" => $carpool,
                    "errors"  => $errors
                ]);
                return;
            }

            $okCreditPassenger = $carpoolsUsersRepository->updateCreditPassenger($userId, $price);
            $okInsert = $newCarpoolRepository->insertCarpoolsUsers($userId, $carpoolId, $roleInCarpool, $statusInCarpool);
            $okSeat = $carpoolsUsersRepository->updateRemainingSeatInCarpool($carpoolId);

            if ($okCreditPassenger && $okInsert && $okSeat) {
                header('Location: /carpools/future');
                exit;
            }

            $errors[] = "Une erreur est survenue lors de l'inscription au covoiturage";
            $this->render("pages/carpools/carpool_details", [
                "carpool" => $carpool,
                "errors"  => $errors
            ]);
        }
    }
}
