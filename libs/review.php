<?php

function getAverageNotes(PDO $pdo, int $userId): array
{
$stmt = $pdo->prepare(
        'SELECT carpools.id_users, COALESCE(AVG(reviews.notes)) AS average_notes
        FROM reviews
        JOIN carpools ON carpools.id_carpool = reviews.id_carpool
        WHERE carpools.id_users = :id_users
        GROUP BY carpools.id_users;'
    );
    $stmt->bindValue(':id_users', $userId, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC);
}