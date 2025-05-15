<?php

function getStatusCancelCarpool(PDO $pdo): int
{
    $stmt = $pdo->prepare("SELECT id_status_carpool FROM status_carpool WHERE label_status_carpool = 'Annulé'");
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function updateCarpoolStatus(PDO $pdo, int $idStatusCarpool, int $idCarpool) : bool
{
    $update = $pdo->prepare("UPDATE carpools SET id_status_carpool = :id_status_carpool WHERE id_carpool = :id_carpool");
    $update->bindValue(':id_status_carpool', $idStatusCarpool, PDO::PARAM_INT);
    $update->bindValue(':id_carpool', $idCarpool, PDO::PARAM_INT);

    return $update->execute()
}