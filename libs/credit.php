<?php

function updateCreditPassenger(PDO $pdo, int $userId, int $price): bool
{
    $stmt = $pdo->prepare('UPDATE users SET credit = credit - :price WHERE id_users = :id_users');
    $stmt->bindValue(':id_users', $userId, PDO::PARAM_INT);
    $stmt->bindValue(':price', $price, PDO::PARAM_INT);
    return $stmt->execute();
}