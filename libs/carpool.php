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
        WHERE carpools.date_depart < CURRENT_DATE
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
        'SELECT carpools.*, status_carpool.label_status_carpool, travel_types.label_travel_type
        FROM carpools
        JOIN status_carpool ON status_carpool.id_status_carpool = carpools.id_status_carpool
        JOIN users ON users.id_users = carpools.id_users
        JOIN cars ON cars.id_users = users.id_users
        JOIN travel_types ON travel_types.id_travel_type = cars.id_travel_type
        WHERE carpools.id_users = :id_users
        AND date_depart > NOW()
        ORDER BY date_depart ASC'
    );
    $stmt->bindValue(':id_users', $userId, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
