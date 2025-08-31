<?php

namespace App\Repository;

use App\Entity\Carpools;
use App\Entity\Cars;
use App\Entity\StatusCarpool;

class CarpoolsRepository extends Repository
{
    public function getSearchCarpoolCard(string $cityDepart, string $cityArrival, string $dateDepart)
    {
        $stmt = $this->pdo->prepare(
            'SELECT carpools.*, status_carpool.label_status_carpool, travel_types.label_travel_type, users.pseudo AS driver_pseudo
        FROM carpools
        JOIN status_carpool ON carpools.id_status_carpool = status_carpool.id_status_carpool
        JOIN users ON carpools.id_users = users.id_users
        JOIN cars ON cars.id_users = carpools.id_users
        JOIN travel_types ON cars.id_travel_type = travel_types.id_travel_type
        WHERE localisation_depart = :localisation_depart
        AND localisation_arrival = :localisation_arrival
        AND date_depart = :date_depart
        AND carpools.date_depart >= CURRENT_DATE
        AND label_status_carpool = \'Confirmé\'
        AND remaining_seat > 0
        ORDER BY carpools.date_depart ASC'
        );
        $stmt->bindValue(':localisation_depart', $cityDepart, $this->pdo::PARAM_STR);
        $stmt->bindValue(':localisation_arrival', $cityArrival, $this->pdo::PARAM_STR);
        $stmt->bindValue(':date_depart', $dateDepart, $this->pdo::PARAM_STR);
        $stmt->execute();
        $rows = $stmt->fetchAll($this->pdo::FETCH_ASSOC);

        $carpools = [];

        foreach ($rows as $row) {
            $carpool = new Carpools();
            $carpool->setIdCarpool((int)$row['id_carpool']);
            $carpool->setDateDepart(new \DateTime($row['date_depart']));
            $carpool->setTimeDepart(new \DateTime($row['time_depart']));
            $carpool->setTimeArrival(new \DateTime($row['time_arrival']));
            $carpool->setLocalisationDepart($row['localisation_depart']);
            $carpool->setLocalisationArrival($row['localisation_arrival']);
            $carpool->setRemainingSeat((int)$row['remaining_seat']);
            $carpool->setPrice((int)$row['price']);

            // Relations
            $status = new StatusCarpool();
            $status->setLabelStatusCarpool($row['label_status_carpool']);
            $carpool->setStatusCarpool($status);

            $car = new Cars();
            $car->setLabelTravelType($row['label_travel_type']);
            $carpool->setCar($car);

            $carpools[] = $carpool;
        }

        return $carpools;
    }
}
