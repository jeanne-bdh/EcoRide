<?php

function addUser(PDO $pdo, string $pseudo, string $email, string $password): bool|int
{
    $query = "SELECT id_status_session FROM status_session WHERE label_status_session = 'Actif'";
    $stmt = $pdo->prepare($query);
    $statusId = $stmt->fetchColumn();

    if (!$statusId) {
        return false;
    }

    $query = "SELECT id_role FROM roles WHERE label_role = 'user'";
    $stmt = $pdo->prepare($query);
    $roleId = $stmt->fetchColumn();

    if (!$roleId) {
        return false;
    }

    $insertQuery = "INSERT INTO users (pseudo, email, password, id_status_session, id_role, credit)
                    VALUES (:pseudo, :email, :password, :statusId, :roleId, 20)";

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $pdo->prepare($insertQuery);
    $stmt->bindValue(':pseudo', $pseudo);
    $stmt->bindValue(':email', $email);
    $stmt->bindValue(':password', $hashedPassword);
    $stmt->bindValue(':statusId', $statusId, PDO::PARAM_INT);
    $stmt->bindValue(':roleId', $roleId, PDO::PARAM_INT);

    return $stmt->execute();
}

function getUserCredit(PDO $pdo, $userId): int
{
    $query = "SELECT credit FROM users WHERE id_users = :id_users";
    $stmt = $pdo->prepare($query);
    $stmt->bindValue(':id_users', $userId, PDO::PARAM_INT);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        return $user['credit'];
    } else {
        return 0;
    }
}

function getUserForAdmin(PDO $pdo): bool|array
{
    $query = "SELECT users.*, status_session.*
            FROM users
            JOIN status_session ON status_session.id_status_session = users.id_status_session
            WHERE users.id_role = 2
            ORDER BY id_users ASC";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getStatusSession(PDO $pdo, int $userId) : int
{
    $query = "SELECT id_status_session FROM users WHERE id_users = :id_users";
    $stmt = $pdo->prepare($query);
    $stmt->bindValue(':id_users', $userId, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchColumn();
}

function userSuspension(PDO $pdo, int $userId): bool
{
    $query = "UPDATE users SET id_status_session = 2 WHERE id_users = :id_users";
    $stmt = $pdo->prepare($query);
    $stmt->bindValue(':id_users', $userId, PDO::PARAM_INT);
    return $stmt->execute();
}

function userRestart(PDO $pdo, int $userId): bool
{
    $query = "UPDATE users SET id_status_session = 1 WHERE id_users = :id_users";
    $stmt = $pdo->prepare($query);
    $stmt->bindValue(':id_users', $userId, PDO::PARAM_INT);
    return $stmt->execute();
}
