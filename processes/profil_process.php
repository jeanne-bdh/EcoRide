<?php

require_once __DIR__ . "/../libs/pdo.php";
require_once __DIR__ . "/../libs/profil.php";
require_once __DIR__ . "/../libs/user.php";

$errorsForm = [];
$messagesForm = [];

$userId = (int)$_SESSION['users']['id_users'];
$userInfos = getUser($pdo, $userId);

$profilType = $_POST['profilType'] ?? $userInfos['id_profil'] ?? '';
$lastname = $_POST['lastname'] ?? $userInfos['lastname'] ?? '';
$firstname = $_POST['firstname'] ?? $userInfos['firstname'] ?? '';
$address = $_POST['address'] ?? $userInfos['address'] ?? '';
$telephone = $_POST['telephone'] ?? $userInfos['telephone'] ?? '';
$energy = $_POST['energy'] ?? $userInfos['id_energy'] ?? '';
$carModel = $_POST['model'] ?? $userInfos['model'] ?? '';
$carBrand = $_POST['brand'] ?? $userInfos['brand'] ?? '';
$carPlate = $_POST['plate'] ?? $userInfos['nb_plate'] ?? '';
$carColor = $_POST['color'] ?? $userInfos['color'] ?? '';
$carFirstRegist = $_POST['dateRegister'] ?? $userInfos['first_regist'] ?? '';
$carSeats = $_POST['seat'] ?? $userInfos['seats_nb'] ?? '';
$carPreferences = $_POST['preferences'] ?? $userInfos['preferences'] ?? '';

if (isset($_POST['saveProfilForm'])) {
    $res = saveProfilForm($pdo, $_POST['lastname'], $_POST['firstname'], $_POST['address'], $_POST['telephone'], (int)$_SESSION['users']['id_users']);
    $carSaved = saveCar($pdo, $_POST['model'], $_POST['brand'], $_POST['plate'], $_POST['color'], $_POST['energy'], $_POST['dateRegister'], (int)$_POST['seat'], $_POST['preferences'], (int)$_SESSION['users']['id_users']);

    $profilSaved = false;
    if (isset($_POST['profilType'])) {
        $profilSaved = saveSelectProfil($pdo, (int)$_SESSION['users']['id_users'], (int)$_POST['profilType']);
    }

    $energySaved = false;
    if (isset($_POST['energy'])) {
        $energySaved = saveSelectEnergy($pdo, (int)$_SESSION['users']['id_users'], (int)$_POST['energy']);
    }

    if ($res && $profilSaved && $energySaved && $carSaved) {
        $messagesForm[] = "Votre profil a été mis à jour avec succès";
    } else {
        $errorsForm[] = "Erreur lors de l'enregistrement du profil";
    }
}