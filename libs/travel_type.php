<?php

function travelType (PDO $pdo,int $energyId): bool
{

    $travelTypeId = ($energyId === 1) ? 1 : 2;

    $query = $pdo->prepare("UPDATE cars SET id_travel_type = :id_travel_type WHERE id_energy = :id_energy");
    $query->bindValue(':id_travel_type', $travelTypeId, PDO::PARAM_INT);
    $query->bindValue(':id_energy', $energyId, PDO::PARAM_INT);

    return $query->execute();
}
