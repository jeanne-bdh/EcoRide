<?php

namespace App\Controller;

use PDO;

class startController extends Controller
{
    public function start(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_carpool'])) {
            $carpoolId = (int)($_POST['id_carpool']);

            $stmt = $this->pdo->prepare("UPDATE carpools SET id_status_carpool = 3 WHERE id_carpool = :id_carpool");
            $stmt->bindValue(':id_carpool', $carpoolId, PDO::PARAM_INT);

            if ($stmt->execute()) {
                http_response_code(200);
                echo "Démarré";
            } else {
                http_response_code(500);
                echo "Erreur serveur";
            }
        }
    }
}
