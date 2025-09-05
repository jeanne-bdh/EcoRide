<?php

namespace App\Controller;

use App\Repository\CarpoolsRepository;
use App\Repository\CarpoolsUsersRepository;
use App\Repository\UsersRepository;
use App\Service\SessionManager;

class EndController extends Controller
{
    public function end(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_carpool'])) {

            $session = new SessionManager();
            $carpoolRepository = new CarpoolsRepository();
            $carpoolsUsersRepository = new CarpoolsUsersRepository();
            $usersRepository = new UsersRepository();
            
            $carpoolId = (int) $_POST['id_carpool'];
            $userId = $session->getUserId();

            $userCarpool = $carpoolsUsersRepository->getRoleInCarpool($carpoolId, $userId);

            if (!$userCarpool) {
                http_response_code(403);
                echo "Accès refusé";
                exit;
            }

            if ($userCarpool['role_in_carpool'] === 'Passager') {

                $carpoolsUsersRepository->updateEndStatusPassenger($carpoolId, $userId);

                $carpool = $carpoolRepository->getPriceAndDriver($carpoolId);

                $price = $carpool->getPrice();
                $driverId = $carpool->getUser()->getIdUsers();
                $usersRepository->updateCreditDriver($driverId, $price);

                $remainingPassenger = $carpoolsUsersRepository->countPassengerNotArrived($carpoolId);

                if ($remainingPassenger == 0) {
                    $carpoolRepository->endCarpool($carpoolId);
                    $carpoolsUsersRepository->updateEndStatusDriver($carpoolId);
                }

                http_response_code(200);
                echo "Arrivés à destination";
                exit;
            }

            if ($userCarpool['role_in_carpool'] === 'Chauffeur') {
                http_response_code(200);
                exit;
            }
        }
    }
}
