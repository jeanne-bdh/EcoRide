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
