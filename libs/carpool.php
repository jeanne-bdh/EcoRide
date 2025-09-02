<?php

function getPastCarpoolByUser(PDO $pdo, int $userId): array
{
    $stmt = $pdo->prepare(
        'SELECT carpools.*, status_carpool.label_status_carpool, travel_types.label_travel_type, users.pseudo AS driver_pseudo, carpools_users.id_users AS id_participant
        FROM carpools
        JOIN carpools_users ON carpools_users.id_carpool = carpools.id_carpool
        JOIN status_carpool ON carpools.id_status_carpool = status_carpool.id_status_carpool
        JOIN users ON carpools.id_users = users.id_users
        JOIN cars ON cars.id_users = carpools.id_users
        JOIN travel_types ON cars.id_travel_type = travel_types.id_travel_type
        WHERE (carpools.date_depart < CURRENT_DATE OR label_status_carpool IN (\'Annulé\', \'Terminé\'))
        AND carpools_users.id_users = :id_users
        ORDER BY carpools.date_depart DESC'
    );
    $stmt->bindValue(':id_users', $userId, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getFutureCarpoolByUser(PDO $pdo, int $userId): array
{
    $stmt = $pdo->prepare(
        'SELECT carpools.*, status_carpool.label_status_carpool, travel_types.label_travel_type, users.pseudo AS driver_pseudo, carpools_users.id_users AS id_participant, carpools_users.role_in_carpool
        FROM carpools
        JOIN carpools_users ON carpools_users.id_carpool = carpools.id_carpool
        JOIN status_carpool ON carpools.id_status_carpool = status_carpool.id_status_carpool
        JOIN users ON carpools.id_users = users.id_users
        JOIN cars ON cars.id_users = carpools.id_users
        JOIN travel_types ON cars.id_travel_type = travel_types.id_travel_type
        WHERE carpools.date_depart > CURRENT_DATE
        AND carpools_users.id_users = :id_users
        AND label_status_carpool IN (\'Confirmé\', \'Démarré\')
        ORDER BY carpools.date_depart ASC'
    );
    $stmt->bindValue(':id_users', $userId, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

/*
function getSearchCarpoolCard(PDO $pdo, string $cityDepart, string $cityArrival, string $dateDepart): array
{
    $stmt = $pdo->prepare(
        'SELECT carpools.*, status_carpool.label_status_carpool, travel_types.label_travel_type, users.pseudo AS driver_pseudo
        FROM carpools
        JOIN status_carpool ON carpools.id_status_carpool = status_carpool.id_status_carpool
        JOIN users ON carpools.id_users = users.id_users
        JOIN cars ON cars.id_users = carpools.id_users
        JOIN travel_types ON cars.id_travel_type = travel_types.id_travel_type
        WHERE localisation_depart = :localisation_depart
        AND localisation_arrival = :localisation_arrival
        AND date_depart = :date_depart
        AND carpools.date_depart > CURRENT_DATE
        AND label_status_carpool = \'Confirmé\'
        AND remaining_seat > 0
        ORDER BY carpools.date_depart ASC'
    );
    $stmt->bindValue(':localisation_depart', $cityDepart, PDO::PARAM_STR);
    $stmt->bindValue(':localisation_arrival', $cityArrival, PDO::PARAM_STR);
    $stmt->bindValue(':date_depart', $dateDepart, PDO::PARAM_STR);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getCarpoolDetails(PDO $pdo, int $carpoolId): array | bool
{
    $stmt = $pdo->prepare(
        'SELECT carpools.*, cars.*, status_carpool.label_status_carpool, travel_types.label_travel_type, energies.label_energy, users.pseudo AS driver_pseudo
        FROM carpools
        JOIN status_carpool ON carpools.id_status_carpool = status_carpool.id_status_carpool
        JOIN users ON carpools.id_users = users.id_users
        JOIN cars ON cars.id_users = carpools.id_users
        JOIN energies ON cars.id_energy = energies.id_energy
        JOIN travel_types ON cars.id_travel_type = travel_types.id_travel_type
        WHERE carpools.id_carpool = :id_carpool'
    );
    $stmt->bindValue(':id_carpool', $carpoolId, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC);
}
    */