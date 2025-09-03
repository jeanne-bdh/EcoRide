<?php

namespace App\Repository;

use App\Entity\Carpools;
use App\Entity\CarpoolsUsers;
use App\Entity\Cars;
use App\Entity\Energies;
use App\Entity\StatusCarpool;
use App\Entity\TravelTypes;
use App\Entity\Users;
use PDO;

class CarpoolsRepository extends Repository
{
    public function getSearchCarpoolCard(string $cityDepart, string $cityArrival, string $dateDepart)
    {
        $stmt = $this->pdo->prepare(
            'SELECT cp.*, s.label_status_carpool, t.label_travel_type, u.pseudo AS driver_pseudo
            FROM carpools cp
            JOIN status_carpool s ON cp.id_status_carpool = s.id_status_carpool
            JOIN users u ON cp.id_users = u.id_users
            JOIN cars c ON c.id_users = cp.id_users
            JOIN travel_types t ON c.id_travel_type = t.id_travel_type
            WHERE localisation_depart = :localisation_depart
            AND localisation_arrival = :localisation_arrival
            AND DATE(cp.date_depart) = :date_depart
            AND cp.date_depart >= CURRENT_DATE
            AND label_status_carpool = \'Confirmé\'
            AND remaining_seat > 0
            ORDER BY cp.date_depart ASC'
        );

        $stmt->bindValue(':localisation_depart', $cityDepart, PDO::PARAM_STR);
        $stmt->bindValue(':localisation_arrival', $cityArrival, PDO::PARAM_STR);
        $stmt->bindValue(':date_depart', $dateDepart, PDO::PARAM_STR);
        $stmt->execute();

        $details = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $carpools = [];

        foreach ($details as $detail) {
            $driver = (new Users())
                ->setIdUsers($detail['id_users'])
                ->setPseudo($detail['driver_pseudo']);

            $travelType = (new TravelTypes())
                ->setLabelTravelType($detail['label_travel_type']);

            $car = (new Cars())
                ->setUser($driver)
                ->setTravelType($travelType);

            $statusCarpool = (new StatusCarpool())
                ->setLabelStatusCarpool($detail['label_status_carpool']);

            $carpool = (new Carpools())
                ->setIdCarpool($detail['id_carpool'])
                ->setDateDepart(new \DateTime($detail['date_depart']))
                ->setTimeDepart(new \DateTime($detail['time_depart']))
                ->setTimeArrival(new \DateTime($detail['time_arrival']))
                ->setLocalisationDepart($detail['localisation_depart'])
                ->setLocalisationArrival($detail['localisation_arrival'])
                ->setRemainingSeat($detail['remaining_seat'])
                ->setPrice($detail['price'])
                ->setUser($driver)
                ->setCar($car)
                ->setStatusCarpool($statusCarpool);

            $carpools[] = $carpool;
        }
        return $carpools;
    }

    public function getCarpoolDetails(int $carpoolId): ?Carpools
    {
        $stmt = $this->pdo->prepare(
            'SELECT cp.*, c.brand, c.model, c.color, c.preferences, c.smoker, c.animal, s.label_status_carpool, t.label_travel_type, e.label_energy, u.pseudo AS driver_pseudo
        FROM carpools cp
        JOIN status_carpool s ON cp.id_status_carpool = s.id_status_carpool
        JOIN users u ON cp.id_users = u.id_users
        JOIN cars c ON c.id_users = cp.id_users
        JOIN energies e ON c.id_energy = e.id_energy
        JOIN travel_types t ON c.id_travel_type = t.id_travel_type
        WHERE cp.id_carpool = :id_carpool'
        );
        $stmt->bindValue(':id_carpool', $carpoolId, PDO::PARAM_INT);
        $stmt->execute();

        $detail = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$detail) {
            return null;
        }

        $driver = (new Users())
            ->setPseudo($detail['driver_pseudo']);

        $travelType = (new TravelTypes())
            ->setLabelTravelType($detail['label_travel_type']);

        $statusCarpool = (new StatusCarpool())
            ->setLabelStatusCarpool($detail['label_status_carpool']);

        $energy = (new Energies())
            ->setLabelEnergy($detail['label_energy']);

        $car = (new Cars())
            ->setBrand($detail['brand'])
            ->setModel($detail['model'])
            ->setColor($detail['color'])
            ->setPreferences($detail['preferences'])
            ->setSmoker($detail['smoker'])
            ->setAnimal($detail['animal'])
            ->setTravelType($travelType)
            ->setEnergy($energy);

        return (new Carpools())
            ->setIdCarpool($detail['id_carpool'])
            ->setDateDepart(new \DateTime($detail['date_depart']))
            ->setTimeDepart(new \DateTime($detail['time_depart']))
            ->setTimeArrival(new \DateTime($detail['time_arrival']))
            ->setLocalisationDepart($detail['localisation_depart'])
            ->setLocalisationArrival($detail['localisation_arrival'])
            ->setRemainingSeat($detail['remaining_seat'])
            ->setPrice($detail['price'])
            ->setUser($driver)
            ->setCar($car)
            ->setStatusCarpool($statusCarpool);
    }

    public function getPastCarpoolByUser(int $userId): array
    {
        $stmt = $this->pdo->prepare(
            'SELECT cp.*, s.label_status_carpool, t.label_travel_type, u.pseudo AS driver_pseudo, cu.id_users AS id_participant
            FROM carpools cp
            JOIN carpools_users cu ON cu.id_carpool = cp.id_carpool
            JOIN status_carpool s ON cp.id_status_carpool = s.id_status_carpool
            JOIN users u ON cp.id_users = u.id_users
            JOIN cars c ON c.id_users = cp.id_users
            JOIN travel_types t ON c.id_travel_type = t.id_travel_type
            WHERE (cp.date_depart < CURRENT_DATE OR label_status_carpool IN (\'Annulé\', \'Terminé\'))
            AND cu.id_users = :id_users
            ORDER BY cp.date_depart DESC'
        );
        $stmt->bindValue(':id_users', $userId, PDO::PARAM_INT);
        $stmt->execute();

        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $history = [];

        foreach ($rows as $row) {
            $user = (new Users())
                ->setPseudo($row['driver_pseudo']);

            $travelType = (new TravelTypes())
                ->setLabelTravelType($row['label_travel_type']);

            $car = (new Cars())
                ->setTravelType($travelType);

            (new CarpoolsUsers())
                ->setIdUsers($user);

            $statusCarpool = (new StatusCarpool())
                ->setLabelStatusCarpool($row['label_status_carpool']);

            $carpool = (new Carpools())
                ->setIdCarpool($row['id_carpool'])
                ->setDateDepart(new \DateTime($row['date_depart']))
                ->setTimeDepart(new \DateTime($row['time_depart']))
                ->setTimeArrival(new \DateTime($row['time_arrival']))
                ->setLocalisationDepart($row['localisation_depart'])
                ->setLocalisationArrival($row['localisation_arrival'])
                ->setRemainingSeat($row['remaining_seat'])
                ->setPrice($row['price'])
                ->setUser($user)
                ->setCar($car)
                ->setStatusCarpool($statusCarpool);

            $history[] = $carpool;
        }
        return $history;
    }

    public function getFutureCarpoolByUser(int $userId): array
    {
        $stmt = $this->pdo->prepare(
            'SELECT cp.*, s.label_status_carpool, t.label_travel_type, u.pseudo AS driver_pseudo, cu.id_users AS id_participant, cu.role_in_carpool
            FROM carpools cp
            JOIN carpools_users cu ON cu.id_carpool = cp.id_carpool
            JOIN status_carpool s ON cp.id_status_carpool = s.id_status_carpool
            JOIN users u ON cp.id_users = u.id_users
            JOIN cars c ON c.id_users = cp.id_users
            JOIN travel_types t ON c.id_travel_type = t.id_travel_type
            WHERE cp.date_depart > CURRENT_DATE
            AND cu.id_users = :id_users
            AND label_status_carpool IN (\'Confirmé\', \'Démarré\')
            ORDER BY cp.date_depart ASC'
            );
        $stmt->bindValue(':id_users', $userId, PDO::PARAM_INT);
        $stmt->execute();

        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $future = [];

        foreach ($rows as $row) {
            $user = (new Users())
                ->setPseudo($row['driver_pseudo']);

            $travelType = (new TravelTypes())
                ->setLabelTravelType($row['label_travel_type']);

            $car = (new Cars())
                ->setTravelType($travelType);

            (new CarpoolsUsers())
                ->setIdUsers($user)
                ->setRoleInCarpool($row['role_in_carpool']);

            $statusCarpool = (new StatusCarpool())
                ->setLabelStatusCarpool($row['label_status_carpool']);

            $carpool = (new Carpools())
                ->setIdCarpool($row['id_carpool'])
                ->setDateDepart(new \DateTime($row['date_depart']))
                ->setTimeDepart(new \DateTime($row['time_depart']))
                ->setTimeArrival(new \DateTime($row['time_arrival']))
                ->setLocalisationDepart($row['localisation_depart'])
                ->setLocalisationArrival($row['localisation_arrival'])
                ->setRemainingSeat($row['remaining_seat'])
                ->setPrice($row['price'])
                ->setUser($user)
                ->setCar($car)
                ->setStatusCarpool($statusCarpool);

            $future[] = $carpool;
        }
        return $future;
    }

    public function cancelCarpool(int $carpoolId)
    {
        $stmt = $this->pdo->prepare("SELECT id_status_carpool FROM status_carpool WHERE label_status_carpool = 'Annulé'");
        $stmt->execute();
        $cancelStatus = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($cancelStatus) {
            $cancelId = $cancelStatus['id_status_carpool'];

            $updateStmt = $this->pdo->prepare("UPDATE carpools SET id_status_carpool = :id_status_carpool WHERE id_carpool = :id_carpool");
            $updateStmt->bindValue(':id_status_carpool', $cancelId, PDO::PARAM_INT);
            $updateStmt->bindValue(':id_carpool', $carpoolId, PDO::PARAM_INT);
            return $updateStmt->execute();
        }
        return false;
    }
}
