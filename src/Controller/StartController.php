<?php

namespace App\Controller;

use App\Repository\CarpoolsRepository;

class StartController extends Controller
{
    public function start(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_carpool'])) {
            $carpoolId = (int)($_POST['id_carpool']);

            $carpoolRepository = new CarpoolsRepository();
            $start = $carpoolRepository->startCarpool($carpoolId);

            if ($start) {
                http_response_code(200);
                echo "Démarré";
            } else {
                http_response_code(500);
                echo "Erreur serveur";
            }
        }
    }
}
