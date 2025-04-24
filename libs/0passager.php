<?php
/*
if (isUserConnected()) {
    $userId = $_SESSION['users'];
    $credit = getUserCredit($pdo, $userId);

    // Récupérer le rôle de l'utilisateur
    $query = $pdo->prepare("SELECT role FROM users WHERE id = ?");
    $query->execute([$userId]);
    $userRole = $query->fetchColumn(); // Récupère directement la valeur du champ 'role'
} else {
    $credit = 0;
    $userRole = null;
} */