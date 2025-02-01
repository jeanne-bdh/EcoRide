<?php
/*
require_once __DIR__. "/pages/lib/pdo.php";
require_once __DIR__. "/pages/lib/user.php";

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Récupérer les données du formulaire de connexion
    $emailForm = $_POST['id'];
    $passwordForm = $_POST['password'];

    // Récupérer les users
    $query = "SELECT * FROM users WHERE id_users = :id";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':id', $emailForm);
    $stmt->execute();

    // Est-ce que l'email existe ?
    if ($stmt->rowCount() == 1) {
        $monUser = $stmt->fetch(PDO::FETCH_ASSOC);
        if (password_verify($passwordForm, $monUser['password'])) {
            echo "Connexion réussie ! Bienvenue " . $monUser['nom'] . " " . $monUser['prenom'];
        } else {
            echo "Mot de passe incorrect";
        }
    } else {
        echo "Utilisateur introuvable, êtes-vous sûr de votre email ?";
    }
} catch (PDOException $e) {
    echo "Erreur de connexion à la base de donnée : " . $e->getMessage();
}
    */
