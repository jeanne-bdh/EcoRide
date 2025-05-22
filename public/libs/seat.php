<?php

function getRemainingSeat(PDO $pdo, int $carpoolId, int $carId): bool
{
    $stmt = $pdo->prepare("SELECT seats_nb FROM cars WHERE id_car = :id_car");
    $stmt->bindValue(':id_car', $carId, PDO::PARAM_INT);
    $stmt->execute();

    $seatNb = $stmt->fetchColumn();

    if ($seatNb === false) {
        return false;
    }

    $update = $pdo->prepare("UPDATE carpools SET remaining_seat = :remaining_seat WHERE id_carpool = :id_carpool");
    $update->bindValue(':remaining_seat', $seatNb, PDO::PARAM_INT);
    $update->bindValue(':id_carpool', $carpoolId, PDO::PARAM_INT);

    return $update->execute();
}