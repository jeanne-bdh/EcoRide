<?php

require_once __DIR__ . "/../libs/pdo.php";
require_once __DIR__ . "/../libs/profil.php";
require_once __DIR__ . "/../libs/travel_type.php";

$errorsPersonalInfos = [];
$errorsForm = [];
$messagesForm = [];

$userId = (int)$_SESSION['users']['id_users'];
$userInfos = getUser($pdo, $userId);

// Personal infos
$profilType = $_POST['profilType'] ?? $userInfos['id_profil'] ?? '';
$lastname = $_POST['lastname'] ?? $userInfos['lastname'] ?? '';
$firstname = $_POST['firstname'] ?? $userInfos['firstname'] ?? '';
$address = $_POST['address'] ?? $userInfos['address'] ?? '';
$telephone = $_POST['telephone'] ?? $userInfos['telephone'] ?? '';

// Car infos
$carId = $userInfos['id_car'] ?? 0;
$carModel = $_POST['model'] ?? $userInfos['model'] ?? '';
$carBrand = $_POST['brand'] ?? $userInfos['brand'] ?? '';
$carPlate = $_POST['plate'] ?? $userInfos['nb_plate'] ?? '';
$carColor = $_POST['color'] ?? $userInfos['color'] ?? '';
$energyId = (int)($_POST['energy'] ?? $userInfos['energy'] ?? '');
$carFirstRegist = $_POST['dateRegister'] ?? $userInfos['date_register'] ?? '';
$carSeats = (int)($_POST['seat'] ?? $userInfos['seats_nb'] ?? '');
$carPreferences = $_POST['preferences'] ?? $userInfos['preferences'] ?? '';

if (isset($_POST['saveProfilForm'])) {
    if ($profilType === 1) {
        if (empty($lastname) || empty($firstname) || empty($address) || empty($telephone)) {
            $errorsPersonalInfos[] = "Veuillez compléter votre profil";
        }
    } elseif ($profilType === 2 || $profilType === 3) {
        if (
            empty($lastname) || empty($firstname) || empty($address) || empty($telephone) ||
            empty($carModel) || empty($carBrand) || empty($carPlate) || empty($carColor) ||
            empty($energyId) || empty($carFirstRegist) || empty($carSeats) || empty($carPreferences)
        ) {
            $errorsPersonalInfos[] = "Veuillez compléter votre profil";
        }
    }
}

if (isset($_POST['saveProfilForm'])) {
    $personalForm = saveProfilForm($pdo, $lastname, $firstname, $address, $telephone, $userId);

    $profilSaved = false;
    if (isset($_POST['profilType'])) {
        $profilSaved = saveSelectProfil($pdo, $userId, $profilType);
    }

    $energySaved = false;
    $carSaved = false;
    if ($profilType === 2 || $profilType === 3) {
        $carSaved = saveCar($pdo, $carModel, $carBrand, $carPlate, $carColor, $energyId, $carFirstRegist, $carSeats, $carPreferences, $userId, $carId);

        if (isset($_POST['energy'])) {
            $energySaved = saveSelectEnergy($pdo, $userId, $energyId);

            getTravelType($pdo, $energyId);
        }
    }

    if ($personalForm && $profilSaved && $carSaved && $energySaved) {
        $messagesForm[] = "Votre profil a été mis à jour avec succès";
    } else {
        $errorsForm[] = "Erreur lors de l'enregistrement du profil";
    }
}