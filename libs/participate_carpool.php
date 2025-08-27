<?php

function getUserCheck(PDO $pdo, int $userId, int $carpoolId) : PDOStatement
{
    $stmtUserCheck = $pdo->prepare("SELECT * FROM carpools_users WHERE id_users = :id_users AND id_carpool = :id_carpool");
    $stmtUserCheck->bindValue(':id_users', $userId, PDO::PARAM_INT);
    $stmtUserCheck->bindValue(':id_carpool', $carpoolId, PDO::PARAM_INT);
    
    $stmtUserCheck->execute();
    return $stmtUserCheck;
}

function insertCarpoolsUsers(PDO $pdo, int $userId, int $carpoolId, string $roleInCarpool) : bool
{
    $stmt = $pdo->prepare(
        "INSERT INTO carpools_users (id_users, id_carpool, role_in_carpool)
        VALUES (:id_users, :id_carpool, :role_in_carpool)"
    );

    $stmt->bindValue(':id_users', $userId, PDO::PARAM_INT);
    $stmt->bindValue(':id_carpool', $carpoolId, PDO::PARAM_INT);
    $stmt->bindValue(':role_in_carpool', $roleInCarpool, PDO::PARAM_STR);

    return $stmt->execute();
}