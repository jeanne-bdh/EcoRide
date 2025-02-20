<?php

function getPastCarpoolByUser(PDO $pdo, int $userId): array
{
    $stmt = $pdo->prepare(
        'SELECT carpool.*, travel_type.label_travel_type, status_carpool.label_status_carpool
        FROM carpool
        JOIN car ON carpool.id_users = car.id_users
        JOIN travel_type ON car.id_travel_type = travel_type.id_travel_type
        JOIN status_carpool ON carpool.id_status_carpool = status_carpool.id_status_carpool
        WHERE carpool.date_depart < CURDATE()
        AND carpool.id_users = :id_users
        AND carpool.id_status_carpool = 2
        ORDER BY carpool.date_depart DESC'
    );
    $stmt->bindValue(':id_users', $userId, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getFutureCarpoolByUser(PDO $pdo, int $userId): array
{
    $stmt = $pdo->prepare(
        'SELECT *
        FROM carpool
        JOIN label_travel_type ON travel_type.id_travel_type = carpool.id_travel_type
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
        'SELECT carpool.*, travel_type.label_travel_type, users.pseudo, COALESCE(AVG(review.notes), 0) AS average_note
        FROM carpool
        JOIN users ON carpool.id_users = users.id_users
        JOIN car ON car.id_users = users.id_users
        JOIN travel_type ON car.id_travel_type = travel_type.id_travel_type
        LEFT JOIN review ON carpool.id_carpool = review.id_carpool
        GROUP BY carpool.id_carpool, travel_type.label_travel_type, users.pseudo'
    );
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getCarpoolById(PDO $pdo): array
{
    $stmt = $pdo->prepare(
        'SELECT carpool.*, travel_type.label_travel_type, users.pseudo, COALESCE(AVG(review.notes), 0) AS average_note
        FROM carpool
        JOIN users ON carpool.id_users = users.id_users
        JOIN car ON car.id_users = users.id_users
        JOIN travel_type ON car.id_travel_type = travel_type.id_travel_type
        LEFT JOIN review ON carpool.id_carpool = review.id_carpool
        GROUP BY carpool.id_carpool, travel_type.label_travel_type, users.pseudo'
    );
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
