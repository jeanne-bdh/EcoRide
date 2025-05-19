<?php

function searchCarpool(PDO $pdo, string $localDepart, string $localArrival, string $dateCarpool): array
{
    $stmt = $pdo->prepare("SELECT * FROM carpools");

    $stmt->bindValue(':localisation_depart', $localDepart, PDO::PARAM_STR);
    $stmt->bindValue(':localisation_arrival', $localArrival, PDO::PARAM_STR);
    $stmt->bindValue(':date_depart', $dateCarpool, PDO::PARAM_STR);

    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}