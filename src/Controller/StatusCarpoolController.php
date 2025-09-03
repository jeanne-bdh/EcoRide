<?php

namespace App\Controller;

use App\Repository\StatusCarpoolRepository;

class StatusCarpoolController extends Controller
{
    public function cancel(): void
    {
        $statusCarpoolRepository = new StatusCarpoolRepository();

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_carpool'])) {
            $carpoolId = (int)($_POST['id_carpool']);

            $statusCarpoolRepository->cancelCarpool($carpoolId);

            http_response_code(200);
            exit;
        }

        http_response_code(400);
    }
}
