<?php

namespace App\Controller;

use App\Service\SessionManager;
use App\Repository\UsersRepository;

class SessionController extends Controller
{
    public function session(): void
    {
        $session = new SessionManager();
        $userRepository = new UsersRepository();

        if (!$session->isUserConnected()) {
            header("Location: /login");
            exit;
        }

        $userId = $session->getUserId();
        $credit = $userRepository->getUserCredit($userId);
        $profile = $userRepository->getProfile($userId);
        $roleId = $profile['id_role'];

        if (!$profile || !isset($roleId)) {
            die("Le rôle de l'utilisateur est introuvable");
        }

        $view = match ($roleId) {
            1 => "pages/admin/admin_session",
            2 => "pages/users/user_session"
        };

        $this->render($view, [
            "user"   => $userId,
            "credit" => $credit,
            "profile" => $profile
        ]);
    }
}
