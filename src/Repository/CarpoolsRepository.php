<?php

namespace App\Repository;

use App\Entity\Carpools;
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
}
