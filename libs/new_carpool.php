<?php

function saveNewCarpool(PDO $pdo, string $localDepart, string $localArrival, string $dateCarpool, string $duration, string $timeDepart, string $timeArrival, int $price, int $usersId): bool | int
{
        $stmt = $pdo->prepare("INSERT INTO carpools (localisation_depart, localisation_arrival, date_depart, duration, time_depart, time_arrival, price, id_users, id_status_carpool) VALUE (:localisation_depart, :localisation_arrival, :date_depart, :duration, :time_depart, :time_arrival, :price, :id_users, :id_status_carpool)");

    $stmt->bindValue(':localisation_depart', $localDepart, PDO::PARAM_STR);
    $stmt->bindValue(':localisation_arrival', $localArrival, PDO::PARAM_STR);
    $stmt->bindValue(':date_depart', $dateCarpool, PDO::PARAM_STR);
    $stmt->bindValue(':duration', $duration, PDO::PARAM_STR);
    $stmt->bindValue(':time_depart', $timeDepart, PDO::PARAM_STR);
    $stmt->bindValue(':time_arrival', $timeArrival, PDO::PARAM_STR);
    $stmt->bindValue(':price', $price, PDO::PARAM_INT);
    $stmt->bindValue(':id_users', $usersId, PDO::PARAM_INT);
    $stmt->bindValue(':id_status_carpool', 1, PDO::PARAM_INT);

    return $stmt->execute();

}

function validatePrice()
{
    $errorsPrice = [];

    if (isset($_POST['price']) && $_POST['price'] < 0) {
        $errorsPrice[] = "Le prix ne peut pas être négatif";
    }

    return $errorsPrice;
}

function validateDuration($duration)
{
    $errorsDuration = [];

    if($duration <= 0) {
        $errorsDuration [] = "L'heure d'arrivée ne peut être antérieure ou égale à l'heure de départ";
    }

    return $errorsDuration;
}

function getCarByUser (PDO $pdo, $userId): bool|array
{
    $query = "SELECT id_car, brand
            FROM cars
            WHERE id_users = :id_users";
    $stmt = $pdo->prepare($query);
    $stmt->bindValue(':id_users', $userId, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}