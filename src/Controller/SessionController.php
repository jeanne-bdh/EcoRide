<?php
// src/Controller/SessionController.php
namespace App\Controller;

use App\Service\SessionManager;
use App\Repository\UsersRepository;

class SessionController extends Controller
{
    public function process(): void
    {
        $session = new SessionManager();
        $userRepository = new UsersRepository();

        if ($session->isUserConnected()) {
            $userId = $session->getUserId();
            $credit = $userRepository->getUserCredit($userId);

            $profile = $userRepository->getProfile($userId);

            if (!$profile || !isset($profile['id_role'])) {
                die("Le rôle de l'utilisateur est introuvable");
            } else {
                $roleId = $profile['id_role'];
                $profileId = $profile['id_profil'] ?? null;
            }
        } else {
            $credit = 0;
        }
    }
}
