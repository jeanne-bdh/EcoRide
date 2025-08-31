<?php

namespace App\Repository;

use App\Entity\Cars;
use App\Entity\Energies;
use App\Entity\Profiles;
use App\Entity\Roles;
use App\Entity\StatusSession;
use App\Entity\Users;
use App\Entity\TravelTypes;
use PDO;

class CarsRepository extends Repository
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function findById(int $idCar): ?Cars
    {
        $query = "SELECT c.id_car, c.model, c.brand, c.color, c.nb_plate, c.first_regist, c.seats_nb, c.smoker, c.animal, c.preferences, e.id_energy, e.label_energy,t.id_travel_type, t.           label_travel_type, u.id_users, u.pseudo, u.email, u.password, u.photo, u.telephone, u.address, u.lastname, u.firstname, u.credit, u.id_role, u.id_profile, u.id_status_session
                FROM cars c
                JOIN energies e ON c.id_energy = e.id_energy
                LEFT JOIN travel_types t ON c.id_travel_type = t.id_travel_type
                JOIN users u ON c.id_users = u.id_users
                WHERE c.id_car = :id_car";

        $stmt = $this->pdo->prepare($query);
        $stmt->bindValue(':id_car', $idCar, PDO::PARAM_INT);
        $stmt->execute();

        $cars = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$cars) {
            return null;
        }

        $energy = (new Energies())
            ->setIdEnergy($cars['id_energy'])
            ->setLabelEnergy($cars['label_energy']);

        $travelType = null;
        if ($cars['id_travel_type']) {
            $travelType = (new TravelTypes())
                ->setIdTravelType($cars['id_travel_type'])
                ->setLabelTravelType($cars['label_travel_type']);
        }

        $user = (new Users())
            ->setIdUsers($cars['id_users'])
            ->setPseudo($cars['pseudo'])
            ->setEmail($cars['email'])
            ->setPassword($cars['password'])
            ->setPhoto($cars['photo'])
            ->setTelephone($cars['telephone'])
            ->setAddress($cars['address'])
            ->setLastname($cars['lastname'])
            ->setFirstname($cars['firstname'])
            ->setCredit($cars['credit'])
            ->setRole((new Roles())->setIdRole($cars['id_role']))
            ->setProfile((new Profiles())->setIdProfile($cars['id_profile']))
            ->setStatusSession((new StatusSession())->setIdStatusSession($cars['id_status_session']));

        return (new Cars())
            ->setIdCar($cars['id_car'])
            ->setModel($cars['model'])
            ->setBrand($cars['brand'])
            ->setColor($cars['color'])
            ->setNbPlate($cars['nb_plate'])
            ->setFirstRegist($cars['first_regist'])
            ->setSeatsNb($cars['seats_nb'])
            ->setSmoker($cars['smoker'])
            ->setAnimal($cars['animal'])
            ->setPreferences($cars['preferences'])
            ->setEnergy($energy)
            ->setUser($user)
            ->setTravelType($travelType);
    }
}
