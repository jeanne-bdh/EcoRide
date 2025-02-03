<?php

require_once __DIR__ . "/../lib/session.php";

$errors = [];

$dsn = 'mysql:host=127.0.0.1;port=3306;dbname=ecoride';
$username = 'ecoride_php';
$password = 'D-m1m2ppuPEs';

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Récupérer les données du formulaire de connexion
    $emailForm = $_POST['pseudoEmail'];
    $passwordForm = $_POST['password'];

    // Récupérer les users
    $query = "SELECT * FROM users WHERE email = :email";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':email', $emailForm);
    $stmt->execute();

    // Est-ce que l'email existe ?
    if ($stmt->rowCount() == 1) {
        $monUser = $stmt->fetch(PDO::FETCH_ASSOC);

        // Se connecter à la session
        if (password_verify($passwordForm, $monUser['password'])) {
            $_SESSION['users'] = $monUser;
            header('location:/pages/users/userSession.php');
        } else {
            echo "Identifiants incorrects, veuillez réessayez";
        }
    } else {
        echo "Identifiants incorrects, veuillez réessayez";
    }
} catch (PDOException $e) {
    echo "Erreur de connexion à la base de donnée : " . $e->getMessage();
}
