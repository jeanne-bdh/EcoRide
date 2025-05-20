<?php

if (isUserConnected()) {
    $userId = $_SESSION['users']['id_users'];
    $credit = getUserCredit($pdo, $userId);

    $profile = getProfile($pdo, $userId);

    if (!$profile || !isset($profile['id_role'])) {
        die("Le rôle de l'utilisateur est introuvable");
    } else {
        $roleId = $profile['id_role'];
        $profileId = $profile['id_profil'] ?? null;
    }

    // Message incomplete profile
    $errorsPersonalInfos = [];
    $userInfos = getUserAndCar($pdo, $userId);

    if (isset($_POST['savePersonalForm'])) {
        if ($profile === 1) {
            empty($userInfos['lastname']) ||
            empty($userInfos['firstname']) ||
            empty($userInfos['address']) ||
            empty($userInfos['telephone']);
        } elseif ($profile === 2 || $profile === 3) {
            empty($userInfos['lastname']) ||
            empty($userInfos['firstname']) ||
            empty($userInfos['address']) ||
            empty($userInfos['telephone']) ||
            empty($userInfos['model']) ||
            empty($userInfos['brand']) ||
            empty($userInfos['plate']) ||
            empty($userInfos['color']) ||
            empty($userInfos['id_energy']) ||
            empty($userInfos['first_regist']) ||
            empty($userInfos['seats_nb']);
        }
    } else {
        $errorsPersonalInfos[] = "Veuillez compléter votre profil";
        }
} else {
    $credit = 0;
}