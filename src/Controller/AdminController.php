<?php

namespace App\Controller;

use App\Repository\UsersRepository;

class AdminController extends Controller
{
    public function show(): void
    {
        $userRepository = new UsersRepository();
        $userRepository->getUserForAdmin();

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
        }
    }
}
