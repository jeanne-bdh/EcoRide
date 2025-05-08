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

function verifyUniquePseudoRegister(PDO $pdo, string $pseudo)
{
    $query = "SELECT pseudo FROM users WHERE pseudo = :pseudo";
    $stmt = $pdo->prepare($query);
    $stmt->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        return "Ce pseudo est déjà utilisé";
    }

    return true;
}