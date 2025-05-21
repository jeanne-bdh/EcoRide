<?php

require_once __DIR__ . "/../libs/pdo.php";
require_once __DIR__ . "/../libs/personal.php";
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
$carSmoker = isset($_POST['smoker']) ? 'Oui' : ($driverInfos['smoker'] ?? 'Non');
$carAnimal = isset($_POST['animal']) ? 'Oui' : ($driverInfos['animal'] ?? 'Non');
$carPreferences = $_POST['preferences'] ?? $driverInfos['preferences'] ?? '';

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['savePersonalForm'])) {
    
    $personalForm = savePersonalForm($pdo, $lastname, $firstname, $address, $telephone, $userId);

    $profilSaved = false;
    if (isset($_POST['profilType'])) {
        $profilSaved = saveSelectProfil($pdo, (int)$_SESSION['users']['id_users'], (int)$_POST['profilType']);
    }

    // PASSENEGR
    if ($profilType == 1) {
        if ($personalForm && $profilSaved) {
            $messagesForm[] = "Votre profil a été mis à jour avec succès";
            http_response_code(201);
        } else {
            $errorsForm[] = "Erreur lors de l'enregistrement du profil";
            http_response_code(500);
        }
    }

    // DRIVER
    elseif ($profilType == 2 || $profilType == 3) {
        $errorsForm = validateSeat($_POST['seat']);

        if (!empty($errorsForm)) {
            http_response_code(422);
            return;
        }
        $carSaved = saveCar($pdo, $carModel, $carBrand, $carPlate, $carColor, $energyId, $carFirstRegist, $carSeats, $carSmoker, $carAnimal, $carPreferences, $userId, $carId);

        $energySaved = false;
        if (isset($_POST['energy'])) {
            $energyId = (int)$_POST['energy'];
            $energySaved = saveSelectEnergy($pdo, $userId, $energyId);

            getTravelType($pdo, $energyId);
        }

        if ($personalForm && $profilSaved && $energySaved && $carSaved) {
            $messagesForm[] = "Votre profil a été mis à jour avec succès";
            http_response_code(201);
        } else {
            $errorsForm[] = "Erreur lors de l'enregistrement du profil";
            http_response_code(500);
        }
    }
} else {
    http_response_code(200);
}