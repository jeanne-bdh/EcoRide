<?php

function getPastCarpoolByUser(PDO $pdo, int $userId): array
{
    $stmt = $pdo->prepare(
        'SELECT carpools.*, status_carpool.label_status_carpool, travel_types.label_travel_type
        FROM carpools
        LEFT JOIN status_carpool ON carpools.id_status_carpool = status_carpool.id_status_carpool
        LEFT JOIN users ON users.id_users = carpools.id_users
        LEFT JOIN cars ON cars.id_users = users.id_users
        LEFT JOIN travel_types ON travel_types.id_travel_type = cars.id_travel_type
        WHERE carpools.date_depart < CURDATE()
        AND carpools.id_users = :id_users
        ORDER BY carpools.date_depart DESC'
    );
    $stmt->bindValue(':id_users', $userId, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getFutureCarpoolByUser(PDO $pdo, int $userId): array
{
    $stmt = $pdo->prepare(
        'SELECT carpools.*, travel_types.label_travel_type, status_carpool.label_status_carpool
        FROM carpools
        JOIN travel_types ON travel_types.id_travel_type = carpools.id_travel_type
        JOIN status_carpool ON status_carpool.id_status_carpool = carpools.id_status_carpool
        WHERE id_users = :id_users
        AND date_depart > NOW()
        AND label_status_carpool = "Confirmé"
        ORDER BY date_depart ASC'
    );
    $stmt->bindValue(':id_users', $userId, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getCarpoolBySearch(PDO $pdo): array
{
    $stmt = $pdo->prepare(
        'SELECT carpools.*, travel_types.label_travel_type, users.pseudo, COALESCE(AVG(review.notes), 0) AS average_note
        FROM carpools
        JOIN users ON carpools.id_users = users.id_users
        JOIN cars ON cars.id_users = users.id_users
        JOIN travel_types ON cars.id_travel_type = travel_types.id_travel_type
        LEFT JOIN reviews ON carpools.id_carpool = reviews.id_carpool
        GROUP BY carpools.id_carpool, travel_types.label_travel_type, users.pseudo'
    );
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getCarpoolById(PDO $pdo): array
{
    $stmt = $pdo->prepare(
        'SELECT carpools.*, travel_types.label_travel_type, users.pseudo, COALESCE(AVG(reviews.notes), 0) AS average_note
        FROM carpools
        JOIN users ON carpools.id_users = users.id_users
        JOIN cars ON cars.id_users = users.id_users
        JOIN travel_types ON cars.id_travel_type = travel_types.id_travel_type
        LEFT JOIN reviews ON carpools.id_carpool = reviews.id_carpool
        GROUP BY carpools.id_carpool, travel_types.label_travel_type, users.pseudo'
    );
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
