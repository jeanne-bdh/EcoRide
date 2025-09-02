<?php

namespace App\Controller;

use App\Repository\NewCarpoolRepository;
use App\Repository\UsersRepository;
use App\Service\SessionManager;

class NewCarpoolController extends Controller
{
    public function newCarpool(): void
    {
        $newCarpoolRepository = new NewCarpoolRepository();
        $userRepository = new UsersRepository();
        $session = new SessionManager();

        $errorsForm = [];
        $messagesForm = [];

        $userId = $session->getUserId();
        $cars = $newCarpoolRepository->getCarByUser($userId);
        $profile = $userRepository->getProfile($userId);
        $price = $_POST['price'];
        $localDepart = $_POST['localDepart'];
        $localArrival = $_POST['localArrival'];
        $dateCarpool = $_POST['date'];
        $timeDepart = $_POST['timeDepart'];
        $timeArrival = $_POST['timeArrival'];

        $roleId = $profile['id_role'] ?? null;
        $profileId = $profile['id_profil'] ?? null;

        if (!($roleId == 2 && ($profileId == 2 || $profileId == 3))) {
            http_response_code(403);
            die("Profil introuvable");
        }

        if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['saveNewCarpool'])) {

            if (!isset($_POST['car-select']) || empty($_POST['car-select'])) {
                $errorsForm[] = "Aucun véhicule sélectionné";
            }

            $errorsForm = array_merge($errorsForm, $newCarpoolRepository->validatePrice($price), $newCarpoolRepository->validateDuration($timeDepart, $timeArrival), $newCarpoolRepository->validateDate());

            if (empty($errorsForm)) {
                $carId = (int) $_POST['car-select'];
                $carpoolId = $newCarpoolRepository->saveNewCarpool($localDepart, $localArrival, $dateCarpool, $timeDepart, $timeArrival, $price, $userId, $carId);

                if ($carpoolId) {
                    $newCarpoolRepository->getRemainingSeat($carpoolId, $carId);

                    $insertDriver = $newCarpoolRepository->insertCarpoolsUsers($userId, $carpoolId, 'Chauffeur', 'Confirmé');

                    if ($insertDriver) {
                        $messagesForm[] = "Votre voyage a été enregistré avec succès";
                    } else {
                        $errorsForm[] = "Erreur lors de l'enregistrement du voyage";
                    }
                }
            }
        }
        $this->render("pages/users/new-carpool/new_carpool_form", [
            "errorsForm" => $errorsForm,
            "messagesForm" => $messagesForm,
            "carpoolId" => $carpoolId,
            "cars" => $cars,
        ]);
    }
}
