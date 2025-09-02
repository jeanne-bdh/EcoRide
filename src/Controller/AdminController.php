<?php

namespace App\Controller;

use App\Repository\UsersRepository;

class AdminController extends Controller
{
    public function admin(): void
    {
        $userRepository = new UsersRepository();

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_users'])) {
            $userId = (int)($_POST['id_users']);

            $status = $userRepository->getStatusSession($userId);

            if ($status === 1) {
                if ($userRepository->userSuspension($userId)) {
                    http_response_code(200);
                    echo "Suspendu";
                } else {
                    http_response_code(500);
                    echo "Erreur";
                }
            } elseif ($status === 2) {
                if ($userRepository->userRestart($userId)) {
                    http_response_code(200);
                    echo "Actif";
                } else {
                    http_response_code(500);
                    echo "Erreur";
                }
            } else {
                http_response_code(400);
                echo "Statut de session invalide";
            }
            return;
        }

        $users = $userRepository->getUserForAdmin();

        $this->render("pages/admin/account_suspension", [
            "users" => $users
        ]);
    }
}
