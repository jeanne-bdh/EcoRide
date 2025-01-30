<?php
$dsn = 'mysql:host=127.0.0.1;port=3306;dbname=ecoride';
$username = 'ecoride_php';
$password = 'D-m1m2ppuPEs';

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Récupérer les users
    $query = "SELECT * FROM users";
    $stmt = $pdo->query($query);
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Afficher les users
    foreach ($users as $user) {
        echo "Id : " . $user['id_users'] . "<br>";
        echo "Pseudo : " . $user['pseudo'] . "<br>";
        echo "Email : " . $user['email'] . "<br>";
        echo "Nom : " . $user['nom'] . "<br>";
        echo "Prenom : " . $user['prenom'] . "<br>";
        echo "Mot de passe : " . $user['password'] . "<br>";
        echo "<br>";
    }
} catch (PDOException $e) {
    echo "Erreur de connexion à la base de donnée : " . $e->getMessage();
}
