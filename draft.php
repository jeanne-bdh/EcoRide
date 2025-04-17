<?php


function saveNewCarpool(PDO $pdo, string $localDepart, string $localArrival, string $dateCarpool, string $duration, string $timeDepart, string $timeArrival, int $price, int $usersId): bool | int
{
    if($usersId) {
        $stmt = $pdo->prepare("UPDATE carpools SET localisation_depart = :localisation_depart, localisation_arrival = :localisation_arrival, date_depart = :date_depart, duration = :duration, time_depart = :time_depart, time_arrival = :time_arrival, price = :price WHERE id_users = :id_users");
        $stmt->bindValue(':id_users', $usersId, PDO::PARAM_INT);
    } else {
        $stmt = $pdo->prepare("INSERT INTO carpools (localisation_depart, localisation_arrival, date_depart, duration, time_depart, time_arrival, price, id_users) VALUE (:localisation_depart, :localisation_arrival, :date_depart, :duration, :time_depart, :time_arrival, :price, :id_users)");
    }

    $stmt->bindValue(':localisation_depart', $localDepart, PDO::PARAM_STR);
    $stmt->bindValue(':localisation_arrival', $localArrival, PDO::PARAM_STR);
    $stmt->bindValue(':date_depart', $dateCarpool, PDO::PARAM_STR);
    $stmt->bindValue(':duration', $duration, PDO::PARAM_STR);
    $stmt->bindValue(':time_depart', $timeDepart, PDO::PARAM_STR);
    $stmt->bindValue(':time_arrival', $timeArrival, PDO::PARAM_STR);
    $stmt->bindValue(':price', $price, PDO::PARAM_INT);
    $stmt->bindValue(':id_users', $usersId, PDO::PARAM_INT);

    $res = $stmt->execute();

    if ($res) {
        if ($usersId) {
            return $usersId;
        } else {
            return $pdo->lastInsertId();
        }
    } else {
        return false;
    }
}