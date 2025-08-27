<?php

function getPrice(PDO $pdo, int $carpoolId): int
{
    $stmt = $pdo->prepare("SELECT price FROM carpools WHERE id_carpool = :id_carpool");
    $stmt->bindValue(':id_carpool', $carpoolId, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchColumn();
}