<?php

function getAverageNotes(PDO $pdo, int $userId): array
{
$stmt = $pdo->prepare(
        'SELECT COALESCE(AVG(reviews.notes), 0) AS average_notes
        FROM reviews
        WHERE reviews.id_carpool IN (
            SELECT id_carpool
            FROM carpools_users
            WHERE id_users = :id_users
            AND role_in_carpool = \'chauffeur\')'
    );
    $stmt->bindValue(':id_users', $userId, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC) ?: ['average_notes' => 0];
}

function getReviews(PDO $pdo, int $carpoolId): array
{
$stmt = $pdo->prepare(
        'SELECT reviews.*, status_review.*
        FROM reviews
        JOIN status_review ON status_review.id_status_review = reviews.id_status_review
        WHERE reviews.id_carpool = :id_carpool
        AND label_status_review = \'Validé\''
    );
    $stmt->bindValue(':id_carpool', $carpoolId, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}