<?php
/*
function getUser(PDO $pdo, $userId): bool|array
{
    $query = "SELECT *
            FROM users
            WHERE users.id_users = :id_users";
    $stmt = $pdo->prepare($query);
    $stmt->bindValue(':id_users', $userId, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function getUserAndCar(PDO $pdo, $userId): bool|array
{
    $query = "SELECT *
            FROM users
            LEFT JOIN cars ON cars.id_users = users.id_users
            WHERE users.id_users = :id_users";
    $stmt = $pdo->prepare($query);
    $stmt->bindValue(':id_users', $userId, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function saveSelectProfil(PDO $pdo, int $usersId, int $profilType): bool
{
    $query = $pdo->prepare("UPDATE users SET id_profil = :id_profil WHERE id_users = :id_users");
    $query->bindValue(':id_profil', $profilType, PDO::PARAM_INT);
    $query->bindValue(':id_users', $usersId, PDO::PARAM_INT);

    return $query->execute();
}

function saveSelectEnergy(PDO $pdo, int $carId, int $energy): bool
{
    $query = $pdo->prepare("UPDATE cars SET id_energy = :id_energy WHERE id_car = :id_car");
    $query->bindValue(':id_energy', $energy, PDO::PARAM_INT);
    $query->bindValue(':id_car', $carId, PDO::PARAM_INT);

    return $query->execute();
}

function savePersonalForm(PDO $pdo, string $lastname, string $firstname, string $address, string $telephone, int $userId): bool
{
    $stmt = $pdo->prepare("UPDATE users SET lastname = :lastname, firstname = :firstname, address = :address, telephone = :telephone WHERE id_users = :id_users");
    $stmt->bindValue(':id_users', $userId, PDO::PARAM_INT);
    $stmt->bindValue(':lastname', $lastname, PDO::PARAM_STR);
    $stmt->bindValue(':firstname', $firstname, PDO::PARAM_STR);
    $stmt->bindValue(':address', $address, PDO::PARAM_STR);
    $stmt->bindValue(':telephone', $telephone, PDO::PARAM_STR);

    return $stmt->execute();
}

function saveCar(PDO $pdo, string $carModel, string $carBrand, string $carPlate, string $carColor, int $energyId, string $carFirstRegist, int $carSeats, string $carSmoker, string $carAnimal, string $carPreferences, int $userId, int $carId = 0): bool | int
{
    if($carId) {
        $stmt = $pdo->prepare("UPDATE cars SET model = :model, brand = :brand, nb_plate = :nb_plate, color = :color, id_energy = :id_energy, first_regist = :first_regist, seats_nb = :seats_nb, smoker = :smoker, animal = :animal, preferences = :preferences, id_users = :id_users WHERE id_car = :id_car");
        $stmt->bindValue(':id_car', $carId, PDO::PARAM_INT);
    } else {
        $stmt = $pdo->prepare("INSERT INTO cars (model, brand, nb_plate, color, id_energy, first_regist, seats_nb, smoker, animal, preferences, id_users) VALUES (:model, :brand, :nb_plate, :color, :id_energy, :first_regist, :seats_nb, :smoker, :animal, :preferences, :id_users)");
    }

    $stmt->bindValue(':model', $carModel, PDO::PARAM_STR);
    $stmt->bindValue(':brand', $carBrand, PDO::PARAM_STR);
    $stmt->bindValue(':nb_plate', $carPlate, PDO::PARAM_STR);
    $stmt->bindValue(':color', $carColor, PDO::PARAM_STR);
    $stmt->bindValue(':id_energy', $energyId, PDO::PARAM_INT);
    $stmt->bindValue(':first_regist', $carFirstRegist, PDO::PARAM_STR);
    $stmt->bindValue(':seats_nb', $carSeats, PDO::PARAM_INT);
    $stmt->bindValue(':smoker', $carSmoker, PDO::PARAM_STR);
    $stmt->bindValue(':animal', $carAnimal, PDO::PARAM_STR);
    $stmt->bindValue(':preferences', $carPreferences, PDO::PARAM_STR);
    $stmt->bindValue(':id_users', $userId, PDO::PARAM_INT);

    $res = $stmt->execute();

    if ($res) {
        if ($carId) {
            return $carId;
        } else {
            return $pdo->lastInsertId();
        }
    } else {
        return false;
    }
}

function validateSeat()
{
    $errorsSeat = [];

    if (isset($_POST['seat']) && $_POST['seat'] < 0) {
        $errorsSeat[] = "Le nombre de sièges ne peut pas être négatif";
    }

    return $errorsSeat;
}
    */