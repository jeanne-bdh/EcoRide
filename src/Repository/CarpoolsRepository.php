<?php

namespace App\Repository;

use App\Entity\Carpools;
use App\Entity\Cars;
use App\Entity\StatusCarpool;
use App\Entity\TravelTypes;
use App\Entity\Users;

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
            AND DATE(carpools.date_depart) = :date_depart
            AND carpools.date_depart >= CURRENT_DATE
            AND label_status_carpool = \'Confirmé\'
            AND remaining_seat > 0
            ORDER BY carpools.date_depart ASC'
        );

        $stmt->bindValue(':localisation_depart', $cityDepart, \PDO::PARAM_STR);
        $stmt->bindValue(':localisation_arrival', $cityArrival, \PDO::PARAM_STR);
        $stmt->bindValue(':date_depart', $dateDepart, \PDO::PARAM_STR);
        $stmt->execute();

        $cards = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        $carpools = [];

        foreach ($cards as $card) {
            $driver = (new Users())
                ->setIdUsers($card['id_users'])
                ->setPseudo($card['driver_pseudo']);

            $travelType = (new TravelTypes())
                ->setLabelTravelType($card['label_travel_type']);

            $car = (new Cars())
                ->setUser($driver)
                ->setTravelType($travelType);

            $statusCarpool = (new StatusCarpool())
                ->setLabelStatusCarpool($card['label_status_carpool']);

                $carpool = (new Carpools())
                    ->setIdCarpool($card['id_carpool'])
                    ->setDateDepart(new \DateTime($card['date_depart']))
                    ->setTimeDepart(new \DateTime($card['time_depart']))
                    ->setTimeArrival(new \DateTime($card['time_arrival']))
                    ->setLocalisationDepart($card['localisation_depart'])
                    ->setLocalisationArrival($card['localisation_arrival'])
                    ->setRemainingSeat($card['remaining_seat'])
                    ->setPrice($card['price'])
                    ->setUser($driver)
                    ->setCar($car)
                    ->setStatusCarpool($statusCarpool);

            $carpools[] = $carpool;
        }
        return $carpools;
    }
}