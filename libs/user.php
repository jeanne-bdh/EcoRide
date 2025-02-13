<?php

function verifyUserLoginPassword(PDO $pdo, string $email, string $password): bool|array
{
    $query = "SELECT id_users, pseudo, email, password FROM users WHERE email = :email";
    $stmt = $pdo->prepare($query);
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);
    $stmt->execute();
    $user = $query->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        return $user;
    } else {
        return false;
    }
}

function verifyUniqueEmailRegister(PDO $pdo, string $email)
{
    $query = "SELECT email FROM users WHERE email = :email";
    $stmt = $pdo->prepare($query);
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        die("Cette adresse email est déjà utilisée");
    }
}

function addUser(PDO $pdo, string $pseudo, string $email, string $password): bool|array
{
    $insertQuery = "INSERT INTO users (pseudo, email, password) VALUES (:pseudo, :email, :password)";

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $pdo->prepare($insertQuery);
    $stmt->bindValue(':pseudo', $pseudo);
    $stmt->bindValue(':email', $email);
    $stmt->bindValue(':password', $hashedPassword);

    $stmt->execute();
}

function verifyUser($user): bool|array
{
    $errors = [];

    if (isset($user["pseudo"])) {
        if ($user["pseudo"] === "") {
            $errors["pseudo"] = "Le champ pseudo est requis";
        }
    } else {
        $errors["pseudo"] = "Le champ pseudo n'a pas été envoyé";
    }

    if (isset($user["email"])) {
        if ($user["email"] === "") {
            $errors["email"] = "Le champ email est requis";
        } else {
            if (!filter_var($user["email"], FILTER_VALIDATE_EMAIL)) {
                $errors["email"] = "L'email n'est pas valide";
            }
        }
    } else {
        $errors["email"] = "Le champ email n'a pas été envoyé";
    }

    if (isset($user["password"])) {
        if (strlen($user["password"])  < 8) {
            $errors["password"] = "Le mot de passe doit avoir au moins 8 caractères";
        }
    } else {
        $errors["password"] = "Le champ password n'a pas été envoyé";
    }

    if (count($errors)) {
        return $errors;
    } else {
        return true;
    }
}
