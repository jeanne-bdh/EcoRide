<?php

function getUserCheck(PDO $pdo, int $userId, int $carpoolId) : PDOStatement
{
    $stmtUserCheck = $pdo->prepare("SELECT * FROM carpools_users WHERE id_users = :id_users AND id_carpool = :id_carpool");
    $stmtUserCheck->bindValue(':id_users', $userId, PDO::PARAM_INT);
    $stmtUserCheck->bindValue(':id_carpool', $carpoolId, PDO::PARAM_INT);
    
    $stmtUserCheck->execute();
    return $stmtUserCheck;
}