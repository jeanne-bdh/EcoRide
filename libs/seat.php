<?php

function getRemainingSeat(PDO $pdo, int $carId) : bool
{
    $query = $pdo->prepare("SELECT seats_nb FROM cars WHERE id_car = :id_car");
    $query->bindValue(':id_car', $carId, PDO::PARAM_INT);
    $query->execute();

    $seatNb = $query->fetchColumn();

    if ($seatNb === false) {
        return false;
    }

    $stmt = $pdo->prepare("UPDATE carpools SET remaining_seat = :remaining_seat WHERE id_car = :id_car");
    $stmt->bindValue(':remaining_seat', $seatNb, PDO::PARAM_INT);
    $stmt->bindValue(':id_car', $carId, PDO::PARAM_INT);

    return $stmt->execute();
}