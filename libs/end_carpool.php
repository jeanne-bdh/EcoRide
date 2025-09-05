<?php
/*
function getRoleInCarpool(PDO $pdo, $carpoolId, $userId): array
{
    $stmt = $pdo->prepare("SELECT role_in_carpool, status_in_carpool
                        FROM carpools_users
                        WHERE id_carpool = :id_carpool AND id_users = :id_users");
    $stmt->bindValue(':id_carpool', $carpoolId, PDO::PARAM_INT);
    $stmt->bindValue(':id_users', $userId, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function updateEndStatusPassenger(PDO $pdo, $carpoolId, $userId): bool
{
    $stmt = $pdo->prepare("UPDATE carpools_users
                            SET status_in_carpool = 'Terminé'
                            WHERE id_carpool = :id_carpool AND id_users = :id_users");
    $stmt->bindValue(':id_carpool', $carpoolId, PDO::PARAM_INT);
    $stmt->bindValue(':id_users', $userId, PDO::PARAM_INT);
    return $stmt->execute();
}

function getPriceAndDriver(PDO $pdo, $carpoolId): array
{
    $stmt = $pdo->prepare("SELECT price, id_users FROM carpools WHERE id_carpool = :id_carpool");
    $stmt->bindValue(':id_carpool', $carpoolId, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function updateCreditDriver(PDO $pdo, $userId, $price): bool
{
    $stmt = $pdo->prepare("UPDATE users SET credit = credit + :price - 2 WHERE id_users = :id_users");
    $stmt->bindValue(':price', $price, PDO::PARAM_INT);
    $stmt->bindValue(':id_users', $userId, PDO::PARAM_INT);
    return $stmt->execute();
}

function countPassengerNotArrived(PDO $pdo, $carpoolId): int
{
    $stmt = $pdo->prepare("SELECT COUNT(*)
                            FROM carpools_users
                            WHERE id_carpool = :id_carpool
                            AND role_in_carpool = 'Passager'
                            AND status_in_carpool != 'Terminé'");
    $stmt->bindValue(':id_carpool', $carpoolId, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchColumn();
}

function updateEndCarpool(PDO $pdo, $carpoolId): bool
{
    $stmt = $pdo->prepare("UPDATE carpools SET id_status_carpool = 4 WHERE id_carpool = :id_carpool");
    $stmt->bindValue(':id_carpool', $carpoolId, PDO::PARAM_INT);
    return $stmt->execute();
}

function updateEndStatusDriver(PDO $pdo, $carpoolId): bool
{
    $stmt = $pdo->prepare("UPDATE carpools_users
                            SET status_in_carpool = 'Terminé'
                            WHERE id_carpool = :id_carpool
                            AND role_in_carpool = 'Chauffeur'");
    $stmt->bindValue(':id_carpool', $carpoolId, PDO::PARAM_INT);
    return $stmt->execute();
}
    */