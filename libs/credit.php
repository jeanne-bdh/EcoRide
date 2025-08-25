<?php

require_once __DIR__ . "/../libs/carpool.php";

function creditCheck(PDO $pdo, int $userId): int
{
    $carpoolId = (int)$_POST['id_carpool'];
    $price = getPrice($pdo, $carpoolId);

    $stmt = $pdo->prepare('SELECT credit FROM users WHERE id_users = :id_users');
    $stmt->bindValue(':id_users', $userId, PDO::PARAM_INT);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        return false;
    }

    if ($user['credit'] < $price) {
        $errorsForm[] = "Vous n’avez pas assez de crédits";
    }

    return (int)$user['credit'];
}

function updateCreditPassager(PDO $pdo, int $userId): int
{
    $stmt = $pdo->prepare('UPDATE users SET credit = credit - :price WHERE id_users = :id_users');
    $stmt->bindValue(':id_users', $userId, PDO::PARAM_INT);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);


    $stmtUpdate = $pdo->prepare("UPDATE users SET credit = credit - :price WHERE id_users = :id_users");
    $stmtUpdate->execute([
        'price' => $price,
        'id_users' => $userId
    ]);
}
