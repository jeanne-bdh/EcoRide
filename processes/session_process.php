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
} else {
    $credit = 0;
}

/*
if (isUserConnected()) {

    $errorsPersonalInfos = [];
    $userId = $_SESSION['users']['id_users'];
    $userInfos = getUserAndCar($pdo, $userId);
    
    if (isset($_POST['savePersonalForm'])) {
        if (
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
            empty($userInfos['seats_nb'])
        ) {
            $errorsPersonalInfos[] = "Veuillez compléter votre profil";
        }
    }
}
    */
