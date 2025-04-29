<?php

require_once __DIR__ . "/../libs/pdo.php";
require_once __DIR__ . "/../libs/profil.php";
require_once __DIR__ . "/../libs/travel_type.php";

$errorsPersonalInfos = [];
$errorsForm = [];
$messagesForm = [];

$userId = (int)$_SESSION['users']['id_users'];
$userInfos = getUser($pdo, $userId);
$driverInfos = getUserAndCar($pdo, $userId);
$carId = $driverInfos['id_car'] ?? 0;

$profilType = $_POST['profilType'] ?? $userInfos['id_profil'] ?? '';
$lastname = $_POST['lastname'] ?? $userInfos['lastname'] ?? '';
$firstname = $_POST['firstname'] ?? $userInfos['firstname'] ?? '';
$address = $_POST['address'] ?? $userInfos['address'] ?? '';
$telephone = $_POST['telephone'] ?? $userInfos['telephone'] ?? '';

$energyId = $_POST['energy'] ?? $driverInfos['id_energy'] ?? '';
$carModel = $_POST['model'] ?? $driverInfos['model'] ?? '';
$carBrand = $_POST['brand'] ?? $driverInfos['brand'] ?? '';
$carPlate = $_POST['plate'] ?? $driverInfos['nb_plate'] ?? '';
$carColor = $_POST['color'] ?? $driverInfos['color'] ?? '';
$carFirstRegist = $_POST['dateRegister'] ?? $driverInfos['first_regist'] ?? '';
$carSeats = $_POST['seat'] ?? $driverInfos['seats_nb'] ?? '';
$carPreferences = $_POST['preferences'] ?? $driverInfos['preferences'] ?? '';

if (isset($_POST['saveProfilForm'])) {
    $personalForm = saveProfilForm($pdo, $lastname, $firstname, $address, $telephone, $userId);

    $profilSaved = false;
    if (isset($_POST['profilType'])) {
        $profilSaved = saveSelectProfil($pdo, (int)$_SESSION['users']['id_users'], (int)$_POST['profilType']);
    }

    // PASSENEGR
    if ($profilType == 1) {
        if ($personalForm && $profilSaved) {
            $messagesForm[] = "Votre profil a été mis à jour avec succès";
        } else {
            $errorsForm[] = "Erreur lors de l'enregistrement du profil";
        }
    }

    // DRIVER
    elseif ($profilType == 2 || $profilType == 3) {
        $carSaved = saveCar($pdo, $carModel, $carBrand, $carPlate, $carColor, $energyId, $carFirstRegist, $carSeats, $carPreferences, $userId, $carId);

        $energySaved = false;
        if (isset($_POST['energy'])) {
            $energyId = (int)$_POST['energy'];
            $energySaved = saveSelectEnergy($pdo, $userId, $energyId);

            getTravelType($pdo, $energyId);
        }

        if ($personalForm && $profilSaved && $energySaved && $carSaved) {
            $messagesForm[] = "Votre profil a été mis à jour avec succès";
        } else {
            $errorsForm[] = "Erreur lors de l'enregistrement du profil";
        }
    }
}