<?php

require_once __DIR__. "/../libs/pdo.php";

try {

    // Récupérer les données du formulaire d'inscription
    $pseudoForm = $_POST['pseudo'];
    $emailForm = $_POST['email'];
    $passwordForm = $_POST['password'];

    // Vérifier l'unicité de l'eamil
    $query = "SELECT * FROM users WHERE email = :email";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':email', $emailForm);
    $stmt->execute();

    // Est-ce que l'email existe ?
    if ($stmt->rowCount() > 0) {
        die("Cette adresse email est déjà utilisée");
    }

    // Hashage (encryptage)
    $hashedPassword = password_hash($passwordForm, PASSWORD_DEFAULT);

    // Insérer les données dans la base
    $insertQuery = "INSERT INTO users (pseudo, email, nom, prenom, password) VALUES (:pseudo, :email, :nom, :prenom, :password)";
    $stmt = $pdo->prepare($insertQuery);
    $stmt->bindParam(':pseudo', $pseudoForm);
    $stmt->bindParam(':email', $emailForm);
    $stmt->bindParam(':nom', $nomForm);
    $stmt->bindParam(':prenom', $prenomForm);
    $stmt->bindParam(':password', $hashedPassword);
    $stmt->execute();

    echo "Inscription réussie";
} catch (PDOException $e) {
    echo "Erreur lors de l'inscription : " . $e->getMessage();
}
