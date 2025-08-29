<?php

namespace App\Repository;

use App\Entity\Carpools;
use App\Entity\Cars;
use App\Entity\Energies;
use App\Entity\StatusCarpool;
use App\Entity\Users;
use App\Entity\TravelTypes;
use PDO;

class CarpoolsRepository
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function findById(int $idCarpool): ?Carpools
    {
        $query = "SELECT c.*, s.*, cp.*
                FROM carpools cp
                JOIN status_carpool s ON s.id_status_carpool = cp.id_status_carpool
                JOIN car c ON c.id_car = cp.id_car
                WHERE cp.id_carpool = :id_carpool";

        $stmt = $this->pdo->prepare($query);
        $stmt->bindValue(':id_carpool', $idCarpool, PDO::PARAM_INT);
        $stmt->execute();

        $carpools = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$carpools) {
            return null;
        }

        $statusCarpool = (new StatusCarpool())
            ->setIdStatusCarpool($carpools['id_status_carpool'])
            ->setLabelStatusCarpool($carpools['label_status_carpool']);

        $car = (new Cars())
            ->setIdCar($carpools['id_car'])
            ->setModel($carpools['model'])
            ->setBrand($carpools['brand'])
            ->setColor($carpools['color'])
            ->setNbPlate($carpools['nb_plate'])
            ->setFirstRegist($carpools['first_regist'])
            ->setSeatsNb($carpools['seats_nb'])
            ->setSmoker($carpools['smoker'])
            ->setAnimal($carpools['animal'])
            ->setPreferences($carpools['preferences'])
            ->setEnergy((new Energies())->setIdEnergy($carpools['id_energy']))
            ->setUser((new Users())->setIdUsers($carpools['id_users']))
            ->setTravelType((new TravelTypes())->setIdTravelType($carpools['id_travel_type']));

        return (new Carpools())
            ->setIdCarpool($carpools['id_carpool'])
            ->setDateDepart(new \DateTime($carpools['date_depart']))
            ->setTimeDepart(new \DateTime($carpools['time_depart']))
            ->setTimeArrival(new \DateTime($carpools['time_arrival']))
            ->setLocalisationDepart($carpools['localisation_depart'])
            ->setLocalisationArrival($carpools['localisation_arrival'])
            ->setRemainingSeat($carpools['remaining_seat'])
            ->setPrice($carpools['price'])
            ->setCar($car)
            ->setStatusCarpool($statusCarpool);
    }
}