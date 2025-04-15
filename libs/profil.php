<?php

function saveSelectProfil(PDO $pdo, int $usersId, int $profilType): bool
{
    $query = $pdo->prepare("UPDATE users SET id_profil = :id_profil WHERE id_users = :id_users");
    $query->bindValue(':id_profil', $profilType, PDO::PARAM_INT);
    $query->bindValue(':id_users', $usersId, PDO::PARAM_INT);

    return $query->execute();
}

function saveSelectEnergy(PDO $pdo, int $usersId, int $energy): bool
{
    $query = $pdo->prepare("UPDATE cars SET id_energy = :id_energy WHERE id_users = :id_users");
    $query->bindValue(':id_energy', $energy, PDO::PARAM_INT);
    $query->bindValue(':id_users', $usersId, PDO::PARAM_INT);

    return $query->execute();
}

function saveProfilForm(PDO $pdo, string $lastname, string $firstname, string $address, string $telephone, int $usersId): bool
{
    $stmt = $pdo->prepare("UPDATE users SET lastname = :lastname, firstname = :firstname, address = :address, telephone = :telephone WHERE id_users = :id_users");
    $stmt->bindValue(':id_users', $usersId, PDO::PARAM_INT);
    $stmt->bindValue(':lastname', $lastname, PDO::PARAM_STR);
    $stmt->bindValue(':firstname', $firstname, PDO::PARAM_STR);
    $stmt->bindValue(':address', $address, PDO::PARAM_STR);
    $stmt->bindValue(':telephone', $telephone, PDO::PARAM_STR);

    return $stmt->execute();
}

function saveCar(PDO $pdo, string $carModel, string $carBrand, string $carPlate, string $carColor, string $energy, string $carFirstRegist, int $carSeats, string $carPreferences, int $usersId): bool
{
    $stmt = $pdo->prepare("INSERT INTO cars (model, brand, nb_plate, color, id_energy, first_regist, seats_nb, preferences, id_users) VALUE (:model, :brand, :nb_plate, :color, :id_energy, :first_regist, :seats_nb, :preferences, :id_users)");
    $stmt->bindValue(':model', $carModel, PDO::PARAM_STR);
    $stmt->bindValue(':brand', $carBrand, PDO::PARAM_STR);
    $stmt->bindValue(':nb_plate', $carPlate, PDO::PARAM_STR);
    $stmt->bindValue(':color', $carColor, PDO::PARAM_STR);
    $stmt->bindValue(':id_energy', $energy, PDO::PARAM_INT);
    $stmt->bindValue(':first_regist', $carFirstRegist, PDO::PARAM_STR);
    $stmt->bindValue(':seats_nb', $carSeats, PDO::PARAM_INT);
    $stmt->bindValue(':preferences', $carPreferences, PDO::PARAM_STR);
    $stmt->bindValue(':id_users', $usersId, PDO::PARAM_INT);

    return $stmt->execute();
}