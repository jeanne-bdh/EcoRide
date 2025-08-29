<?php

namespace App\Repository;

use App\Entity\Carpools;
use App\Entity\CarpoolsUsers;
use App\Entity\Users;
use PDO;

class CarpoolsRepository
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function find(int $idCarpool, int $idUsers): ?CarpoolsUsers
    {
        $query = "SELECT *
                FROM carpools_users
                WHERE id_carpool = :id_carpool
                AND id_users = :id_users";

        $stmt = $this->pdo->prepare($query);
        $stmt->bindValue(':id_carpool', $idCarpool, PDO::PARAM_INT);
        $stmt->bindValue(':id_users', $idUsers, PDO::PARAM_INT);
        $stmt->execute();

        $carpoolsUsers = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$carpoolsUsers) {
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