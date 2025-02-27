<?php

function verifyUserLoginPassword(PDO $pdo, string $email, string $password): bool|array
{
    $query = "SELECT id_users, pseudo, email, password FROM users WHERE email = :email";
    $stmt = $pdo->prepare($query);
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

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
        return "Cette adresse email est déjà utilisée";
    }

    return true;
}

function addUser(PDO $pdo, string $pseudo, string $email, string $password): bool
{
    $query = "SELECT id_status_session FROM status_session WHERE label_status_session = 'Actif'";
    $stmt = $pdo->query($query);
    $statusId = $stmt->fetchColumn();
    
    if (!$statusId) {
        return false;
    }

    $insertQuery = "INSERT INTO users (pseudo, email, password, id_status_session) VALUES (:pseudo, :email, :password, :statusId)";

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $pdo->prepare($insertQuery);
    $stmt->bindValue(':pseudo', $pseudo);
    $stmt->bindValue(':email', $email);
    $stmt->bindValue(':password', $hashedPassword);
    $stmt->bindValue(':statusId', $statusId, PDO::PARAM_INT);

    return $stmt->execute();
}

function verifyUser($user): bool|array
{
    $errorsRegister = [];

    if (isset($user["email"])) {
        if ($user["email"] === "") {
            $errorsRegister["email"] = "Le champ email est requis";
        } else {
            if (!filter_var($user["email"], FILTER_VALIDATE_EMAIL)) {
                $errorsRegister["email"] = "L'email n'est pas valide";
            }
        }
    } else {
        $errorsRegister["email"] = "Le champ email n'a pas été envoyé";
    }

    if (isset($user["password"])) {
        if (strlen($user["password"])  < 8) {
            $errorsRegister["password"] = "Le mot de passe doit avoir au moins 8 caractères";
        }
    } else {
        $errorsRegister["password"] = "Le champ password n'a pas été envoyé";
    }

    if (count($errorsRegister)) {
        return $errorsRegister;
    } else {
        return true;
    }
}
