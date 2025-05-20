<?php

function searchCarpool(PDO $pdo): array
{
    $stmt = $pdo->prepare("SELECT * FROM carpools");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

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
        ORDER BY carpools.date_depart ASC'
    );
    $stmt->bindValue(':localisation_depart', $cityDepart, PDO::PARAM_STR);
    $stmt->bindValue(':localisation_arrival', $cityArrival, PDO::PARAM_STR);
    $stmt->bindValue(':date_depart', $dateDepart, PDO::PARAM_STR);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}