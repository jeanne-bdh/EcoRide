<?php

namespace App\Repository;

use PDO;

class CarpoolsUsersRepository extends Repository
{
    public function getUserCheck(int $userId, int $carpoolId)
    {
        $stmtUserCheck = $this->pdo->prepare("SELECT * FROM carpools_users WHERE id_users = :id_users AND id_carpool = :id_carpool");
        $stmtUserCheck->bindValue(':id_users', $userId, PDO::PARAM_INT);
        $stmtUserCheck->bindValue(':id_carpool', $carpoolId, PDO::PARAM_INT);

        $stmtUserCheck->execute();
        return $stmtUserCheck;
    }

    public function getPrice(int $carpoolId): int
    {
        $stmt = $this->pdo->prepare("SELECT price FROM carpools WHERE id_carpool = :id_carpool");
        $stmt->bindValue(':id_carpool', $carpoolId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchColumn();
    }

    public function getRemainingSeatInCarpool(int $carpoolId): int
    {
        $stmt = $this->pdo->prepare("SELECT remaining_seat FROM carpools WHERE id_carpool = :id_carpool");
        $stmt->bindValue(':id_carpool', $carpoolId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchColumn();
    }

    public function updateCreditPassenger(int $driverId, int $price): bool
    {
        $stmt = $this->pdo->prepare('UPDATE users SET credit = credit - :price WHERE id_users = :id_users');
        $stmt->bindValue(':id_users', $driverId, PDO::PARAM_INT);
        $stmt->bindValue(':price', $price, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function updateRemainingSeatInCarpool(int $carpoolId): bool
    {
        $stmt = $this->pdo->prepare("UPDATE carpools SET remaining_seat = remaining_seat - 1 WHERE id_carpool = :id_carpool");
        $stmt->bindValue(':id_carpool', $carpoolId, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function getRoleInCarpool($carpoolId, $userId): array
    {
        $stmt = $this->pdo->prepare("SELECT role_in_carpool, status_in_carpool
                        FROM carpools_users
                        WHERE id_carpool = :id_carpool AND id_users = :id_users");
        $stmt->bindValue(':id_carpool', $carpoolId, PDO::PARAM_INT);
        $stmt->bindValue(':id_users', $userId, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateEndStatusPassenger($carpoolId, $userId): bool
    {
        $stmt = $this->pdo->prepare("UPDATE carpools_users
                            SET status_in_carpool = 'Terminé'
                            WHERE id_carpool = :id_carpool AND id_users = :id_users");
        $stmt->bindValue(':id_carpool', $carpoolId, PDO::PARAM_INT);
        $stmt->bindValue(':id_users', $userId, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function countPassengerNotArrived($carpoolId): int
    {
        $stmt = $this->pdo->prepare("SELECT COUNT(*)
                            FROM carpools_users
                            WHERE id_carpool = :id_carpool
                            AND role_in_carpool = 'Passager'
                            AND status_in_carpool != 'Terminé'");
        $stmt->bindValue(':id_carpool', $carpoolId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchColumn();
    }

    public function updateEndStatusDriver($carpoolId): bool
    {
        $stmt = $this->pdo->prepare("UPDATE carpools_users
                            SET status_in_carpool = 'Terminé'
                            WHERE id_carpool = :id_carpool
                            AND role_in_carpool = 'Chauffeur'");
        $stmt->bindValue(':id_carpool', $carpoolId, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
