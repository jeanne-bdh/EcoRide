<?php

function verifyUserLoginPassword(PDO $pdo, string $email, string $password): bool|array
{
    $query = $pdo->prepare("SELECT * FROM users WHERE email = :email");
    $query->bindValue(':email', $email, PDO::PARAM_STR);
    $query->execute();
    //fetch() nous permet de récupérer une seule ligne
    $user = $query->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        // verif ok
        return $user;
    } else {
        // email ou mdp incorrect: on retourne false
        return false;
    }
}

function verifyUniqueEmailRegister(PDO $pdo, string $email)
{
    $query = "SELECT * FROM users WHERE email = :email";
    $stmt = $pdo->prepare($query);
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        die("Cette adresse email est déjà utilisée");
    }
}
