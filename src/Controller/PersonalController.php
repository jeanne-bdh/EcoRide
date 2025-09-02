<?php

namespace App\Controller;

use App\Repository\PersonalRepository;
use App\Service\SessionManager;

class PersonalController extends Controller
{
    public function personal(): void
    {
        $personalRepository = new PersonalRepository();
        $session = new SessionManager();
        $errorsForm = [];
        $messagesForm = [];

        $userId = $session->getUserId();

        $userInfos = $personalRepository->getUser($userId);

        $driverInfos = $personalRepository->getUserAndCar($userId);
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

            $personalForm = $personalRepository->savePersonalForm($lastname, $firstname, $address, $telephone, $userId);

            $profilSaved = false;
            if (isset($_POST['profilType'])) {
                $profilSaved = $personalRepository->saveSelectProfil($session->getUserId(), (int)$_POST['profilType']);
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
                $errorsForm = $personalRepository->validateSeat($_POST['seat']);

                if (!empty($errorsForm)) {
                    return;
                }
                $carSaved = $personalRepository->saveCar($carModel, $carBrand, $carPlate, $carColor, $energyId, $carFirstRegist, $carSeats, $carSmoker, $carAnimal, $carPreferences, $userId, $carId);

                $energySaved = false;
                if (isset($_POST['energy'])) {
                    $energyId = (int)$_POST['energy'];
                    $energySaved = $personalRepository->saveSelectEnergy($userId, $energyId);

                    $personalRepository->getTravelType($energyId);
                }

                if ($personalForm && $profilSaved && $energySaved && $carSaved) {
                    $messagesForm[] = "Votre profil a été mis à jour avec succès";
                } else {
                    $errorsForm[] = "Erreur lors de l'enregistrement du profil";
                }
            }
        }
        $this->render("pages/users/personal-infos/personal_infos", [
            "errorsForm"   => $errorsForm,
            "messagesForm" => $messagesForm,
            "userInfos"    => $userInfos,
            "driverInfos"  => $driverInfos,
            "profilType"   => $profilType,
            "lastname"     => $lastname,
            "firstname"    => $firstname,
            "address"      => $address,
            "telephone"    => $telephone,
            "energyId"     => $energyId,
            "carModel"     => $carModel,
            "carBrand"     => $carBrand,
            "carPlate"     => $carPlate,
            "carColor"     => $carColor,
            "carFirstRegist" => $carFirstRegist,
            "carSeats"     => $carSeats,
            "carSmoker"    => $carSmoker,
            "carAnimal"    => $carAnimal,
            "carPreferences" => $carPreferences,
        ]);
    }
}
