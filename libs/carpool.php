<?php

function getPastCarpoolByUser(PDO $pdo, int $userId): array
{
    $stmt = $pdo->prepare(
        'SELECT *
        FROM covoiturage
        JOIN type_voyage ON type_voyage.id_type_voy = covoiturage.id_type_voy
        WHERE id_users = :id_users
        AND date_depart < NOW()
        OR status_covoit = "Annulé"
        ORDER BY date_depart DESC'
    );
    $stmt->bindValue(':id_users', $userId, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getFutureCarpoolByUser(PDO $pdo, int $userId): array
{
    $stmt = $pdo->prepare(
        'SELECT *
        FROM covoiturage
        JOIN type_voyage ON type_voyage.id_type_voy = covoiturage.id_type_voy
        WHERE id_users = :id_users
        AND date_depart > NOW()
        AND status_covoit = "Confirmé"
        ORDER BY date_depart ASC'
    );
    $stmt->bindValue(':id_users', $userId, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getCarpoolBySearch(PDO $pdo): array
{
    $stmt = $pdo->prepare(
        'SELECT covoiturage.*, type_voyage.type_voyage, users.photo
        FROM covoiturage
        JOIN type_voyage ON type_voyage.id_type_voy = covoiturage.id_type_voy
        JOIN users ON users.id_users = covoiturage.id_users
        ORDER BY date_depart ASC'
    );
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getCarpoolById(PDO $pdo): array
{
    $stmt = $pdo->prepare(
        'SELECT *
        FROM covoiturage
        JOIN type_voyage ON type_voyage.id_type_voy = covoiturage.id_type_voy
        WHERE id_covoit = :id_covoit
        ORDER BY date_depart ASC'
    );
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
