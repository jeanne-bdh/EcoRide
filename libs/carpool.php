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

function getCarpoolBySearch(): array
{
    return [
        [
            'id_covoit' => 1,
            'date_depart' => '2025-02-14',
            'prix_pers' => 15,
            'place_restante' => 3,
            'heure_depart' => '08:00',
            'lieu_depart' => 'Paris',
            'duree' => '3h',
            'heure_arrivee' => '11:00',
            'lieu_arrivee' => 'Lyon',
            'type_voyage' => 'Ecolo',
            'photo' => 'smiley-man.jpg',
            'pseudo' => 'Luke'
        ],
        [
            'id_covoit' => 2,
            'date_depart' => '2025-02-15',
            'prix_pers' => 20,
            'place_restante' => 2,
            'heure_depart' => '14:30',
            'lieu_depart' => 'Marseille',
            'duree' => '4h30',
            'heure_arrivee' => '19:00',
            'lieu_arrivee' => 'Nice',
            'type_voyage' => 'Ecolo',
            'photo' => 'smiley-woman.jpg',
            'pseudo' => 'Jane'
        ],
        [
            'id_covoit' => 3,
            'date_depart' => '2025-02-16',
            'prix_pers' => 10,
            'place_restante' => 1,
            'heure_depart' => '07:00',
            'lieu_depart' => 'Bordeaux',
            'duree' => '5h',
            'heure_arrivee' => '12:00',
            'lieu_arrivee' => 'Nantes',
            'type_voyage' => 'Non écolo',
            'photo' => 'person-circle.svg',
            'pseudo' => 'Max'
        ],
    ];
}

/*
function getCarpoolBySearch(PDO $pdo, int $carpoolId): array
{
    $stmt = $pdo->prepare(
        'SELECT *
        FROM covoiturage
        JOIN type_voyage ON type_voyage.id_type_voy = covoiturage.id_type_voy
        WHERE id_covoit = :id_covoit
        ORDER BY date_depart ASC'
    );
    $stmt->bindValue(':id_covoit', $carpoolId, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
*/


function getCarpoolById(int $carpoolId): array
{
    $carpoolsSearch = getCarpoolBySearch();
    return $carpoolsSearch[$carpoolId];
}
