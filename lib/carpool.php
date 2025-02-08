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

function getCarpoolBySearch(PDO $pdo, int $carpoolId): array
{
    $stmt = $pdo->prepare(
        'SELECT *
        FROM covoiturage
        JOIN type_voyage ON type_voyage.id_type_voy = covoiturage.id_type_voy
        ORDER BY date_depart ASC'
    );
    $stmt->bindValue(':id_covoit', $carpoolId, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
