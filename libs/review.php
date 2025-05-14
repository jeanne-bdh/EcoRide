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