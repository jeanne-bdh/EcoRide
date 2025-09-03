<?php

namespace App\Repository;

use App\Entity\Cars;
use PDO;

class NewCarpoolRepository extends Repository
{

    public function saveNewCarpool(string $localDepart, string $localArrival, string $dateCarpool, string $timeDepart, string $timeArrival, int $price, int $usersId, int $carId): int
    {
        $stmt = $this->pdo->prepare("INSERT INTO carpools (localisation_depart, localisation_arrival, date_depart, time_depart, time_arrival, price, id_users, id_status_carpool, id_car) VALUES (:localisation_depart, :localisation_arrival, :date_depart, :time_depart, :time_arrival, :price, :id_users, :id_status_carpool, :id_car)");

        $stmt->bindValue(':localisation_depart', $localDepart, PDO::PARAM_STR);
        $stmt->bindValue(':localisation_arrival', $localArrival, PDO::PARAM_STR);
        $stmt->bindValue(':date_depart', $dateCarpool, PDO::PARAM_STR);
        $stmt->bindValue(':time_depart', $timeDepart, PDO::PARAM_STR);
        $stmt->bindValue(':time_arrival', $timeArrival, PDO::PARAM_STR);
        $stmt->bindValue(':price', $price, PDO::PARAM_INT);
        $stmt->bindValue(':id_users', $usersId, PDO::PARAM_INT);
        $stmt->bindValue(':id_status_carpool', 1, PDO::PARAM_INT);
        $stmt->bindValue(':id_car', $carId, PDO::PARAM_INT);

        $stmt->execute();
        return $this->pdo->lastInsertId();
    }

    public function getCarByUser($userId): array
    {
        $query = "SELECT id_car, brand, model
            FROM cars
            WHERE id_users = :id_users";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindValue(':id_users', $userId, PDO::PARAM_INT);
        $stmt->execute();

        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $cars = [];

        foreach ($rows as $row) {
            $car = (new Cars())
                ->setIdCar($row['id_car'])
                ->setBrand($row['brand'])
                ->setModel($row['model']);

                $cars[] = $car;
        }
        return $cars;
    }

    public function validatePrice(int $price)
    {
        $errorsPrice = [];

        if ($price < 0) {
            $errorsPrice[] = "Le prix ne peut pas être négatif";
        }
        return $errorsPrice;
    }

    public function insertCarpoolsUsers(int $userId, int $carpoolId, string $roleInCarpool, string $statusInCarpool): bool
    {
        $stmt = $this->pdo->prepare(
            "INSERT INTO carpools_users (id_users, id_carpool, role_in_carpool, status_in_carpool)
        VALUES (:id_users, :id_carpool, :role_in_carpool, :status_in_carpool)"
        );

        $stmt->bindValue(':id_users', $userId, PDO::PARAM_INT);
        $stmt->bindValue(':id_carpool', $carpoolId, PDO::PARAM_INT);
        $stmt->bindValue(':role_in_carpool', $roleInCarpool, PDO::PARAM_STR);
        $stmt->bindValue(':status_in_carpool', $statusInCarpool, PDO::PARAM_STR);

        return $stmt->execute();
    }

    public function validateDate(string $date): array
    {
        $errors = [];
        $today = date("Y-m-d");

        if (strtotime($date) < strtotime($today)) {
            $errors[] = "La date ne peut être antérieure";
        }

        return $errors;
    }

    public function getRemainingSeat(int $carpoolId, int $carId): bool|array
    {
        $stmt = $this->pdo->prepare("SELECT seats_nb FROM cars WHERE id_car = :id_car");
        $stmt->bindValue(':id_car', $carId, PDO::PARAM_INT);
        $stmt->execute();

        $seatNb = $stmt->fetchColumn();

        if ($seatNb === false) {
            return false;
        }

        $update = $this->pdo->prepare("UPDATE carpools SET remaining_seat = :remaining_seat WHERE id_carpool = :id_carpool");
        $update->bindValue(':remaining_seat', $seatNb, PDO::PARAM_INT);
        $update->bindValue(':id_carpool', $carpoolId, PDO::PARAM_INT);

        return $update->execute();
    }

    public function validateDuration(string $timeDepart, string $timeArrival)
    {
        $errorsDuration = [];
        $tDepart = strtotime($timeDepart);
        $tArrival = strtotime($timeArrival);

        if ($tArrival <= $tDepart) {
            $errorsDuration[] = "L'heure d'arrivée ne peut être antérieure ou égale à l'heure de départ";
        }
        return $errorsDuration;
    }
}
