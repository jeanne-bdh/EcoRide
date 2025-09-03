<?php

namespace App\Repository;

use PDO;

class StatusCarpoolRepository extends Repository
{
    public function cancelCarpool(int $carpoolId)
    {
        $stmt = $this->pdo->prepare("SELECT id_status_carpool FROM status_carpool WHERE label_status_carpool = 'Annulé'");
        $stmt->execute();
        $cancelStatus = $stmt->fetch();

        if ($cancelStatus) {
            $cancelId = $cancelStatus['id_status_carpool'];

            $updateStmt = $this->pdo->prepare("UPDATE carpools SET id_status_carpool = :id_status_carpool WHERE id_carpool = :id_carpool");
            $updateStmt->bindValue(':id_status_carpool', $cancelId, PDO::PARAM_INT);
            $updateStmt->bindValue(':id_carpool', $carpoolId, PDO::PARAM_INT);
            $updateStmt->execute();
        }
    }
}
