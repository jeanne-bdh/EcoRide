<?php

namespace App\Controller;

use App\Repository\CarpoolsRepository;
use App\Repository\CarpoolsUsersRepository;
use App\Repository\UsersRepository;
use App\Service\SessionManager;

class CancelCarpoolController extends Controller
{
    public function cancel(): void
    {
        $carpoolRepository = new CarpoolsRepository();
        $carpoolsUsersRepository = new CarpoolsUsersRepository();
        $userRepository = new UsersRepository();
        $session = new SessionManager();

        $userId = $session->getUserId();
        $carpoolId = (int)($_POST['id_carpool']);

        $carpool = $carpoolRepository->getDriverInCarpool($carpoolId);

        if ($carpool->getUser()->getIdUsers() == $userId) {
            $carpoolRepository->cancelByDriver($carpoolId);
        } else {
            $price = $carpoolRepository->getPrice($carpoolId);
            $userRepository->reCreditPassenger($userId, $price);
            $carpoolRepository->updateRemainingSeatAfterCancel($carpoolId);
            $carpoolsUsersRepository->deletePassengerFromCarpool($carpoolId, $userId);
        }
    }
}
