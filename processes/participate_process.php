<?php

require_once __DIR__ . "/../libs/pdo.php";
require_once __DIR__ . "/../libs/session.php";
require_once __DIR__ . "/../libs/new_carpool.php";
require_once __DIR__ . "/../libs/run_carpool.php";

$errorsForm = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_carpool'])) {

    $carpoolId = (int)$_POST['id_carpool'];
    $userId = $_SESSION['users']['id_users'];
    $roleInCarpool = "Passager";

    $stmtRole = $pdo->prepare("SELECT id_profil FROM users WHERE id_users = :id_users");
    $stmtRole->execute(['id_users' => $userId]);
    $userRole = (int) $stmtRole->fetchColumn();

    if ($userRole === 2) {
        $errorsForm[] = "Les chauffeurs ne peuvent pas participer à un covoiturage";
        return;
    }

    $stmtUserCheck = getUserCheck($pdo, $userId, $carpoolId);

    if ($stmtUserCheck->rowCount() > 0) {
        $errorsForm[] = "Vous participez déjà à ce covoiturage";
    } else {
        $stmtCarpool = $pdo->prepare("SELECT price, remaining_seat FROM carpools WHERE id_carpool = :id_carpool");
        $stmtCarpool->execute(['id_carpool' => $carpoolId]);
        $carpool = $stmtCarpool->fetch(PDO::FETCH_ASSOC);

        if (!$carpool) {
            $errorsForm[] = "Covoiturage introuvable";
        } elseif ($carpool['remaining_seat'] <= 0) {
            $errorsForm[] = "Plus de places disponibles";
        } else {

            // Vérifier que le passager a assez de crédits
            $stmtUser = $pdo->prepare("SELECT credit FROM users WHERE id_users = :id_users");
            $stmtUser->execute(['id_users' => $userId]);
            $user = $stmtUser->fetch(PDO::FETCH_ASSOC);

            if ($user['credit'] < $carpool['price']) {
                $errorsForm[] = "Vous n'avez pas assez de crédits pour participer";
            } else {

                // Transaction pour tout mettre à jour en même temps
                try {
                    $pdo->beginTransaction();

                    // Déduire le crédit
                    $stmtUpdateCredit = $pdo->prepare("UPDATE users SET credit = credit - :price WHERE id_users = :id_users");
                    $stmtUpdateCredit->execute([
                        'price' => $carpool['price'],
                        'id_users' => $userId
                    ]);

                    // Insérer la participation
                    insertCarpoolsUsers($pdo, $userId, $carpoolId, $roleInCarpool);

                    // Décrémenter la place restante
                    $stmtUpdateSeat = $pdo->prepare("UPDATE carpools SET remaining_seat = remaining_seat - 1 WHERE id_carpool = :id_carpool");
                    $stmtUpdateSeat->execute(['id_carpool' => $carpoolId]);

                    $pdo->commit();

                    // Redirection
                    header("Location: /pages/users/future-carpool/future_carpool.php?view=future");
                    exit;
                } catch (Exception $e) {
                    $pdo->rollBack();
                    $errorsForm[] = "Erreur lors de la participation : " . $e->getMessage();
                }
            }
        }
    }
}
