<?php

require_once dirname(__DIR__) . "/libs/pdo.php";
require_once dirname(__DIR__) . "/libs/session.php";
require_once dirname(__DIR__) . "/libs/carpool.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_carpool'])) {
    $carpoolId = (int) $_POST['id_carpool'];
    $userId = $_SESSION['users']['id_users'];

    // Récupérer le rôle du user
    $stmt = $pdo->prepare("SELECT role_in_carpool, status_in_carpool
                        FROM carpools_users
                        WHERE id_carpool = :id_carpool AND id_users = :id_users
    ");
    $stmt->execute([
        ':id_carpool' => $carpoolId,
        ':id_users' => $userId
    ]);
    $userCarpool = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$userCarpool) {
        http_response_code(403);
        echo "Accès refusé";
        exit;
    }

    // Si passager → mettre "Arrivé" et créditer le chauffeur
    if ($userCarpool['role_in_carpool'] === 'Passager') {
        $pdo->beginTransaction();

        // mettre le statut du passager à "Arrivé"
        $stmt = $pdo->prepare("UPDATE carpools_users
                            SET status_in_carpool = 'Arrivé'
                            WHERE id_carpool = :id_carpool AND id_users = :id_users
        ");
        $stmt->execute([
            ':id_carpool' => $carpoolId,
            ':id_users' => $userId
        ]);

        // récupérer le prix du covoiturage
        $stmt = $pdo->prepare("SELECT price, id_users FROM carpools WHERE id_carpool = :id_carpool");
        $stmt->execute([':id_carpool' => $carpoolId]);
        $carpool = $stmt->fetch(PDO::FETCH_ASSOC);

        $price = $carpool['price'];
        $driverId = $carpool['id_users'];

        // créditer le chauffeur du prix
        $stmt = $pdo->prepare("UPDATE users SET credit = credit + :price - 2 WHERE id_users = :driver_id");
        $stmt->execute([
            ':price' => $price,
            ':driver_id' => $driverId
        ]);

        // vérifier si tous les passagers sont arrivés
        $stmt = $pdo->prepare("SELECT COUNT(*)
                            FROM carpools_users
                            WHERE id_carpool = :id_carpool
                            AND role_in_carpool = 'Passager'
                            AND status_in_carpool != 'Arrivé'
        ");
        $stmt->execute([':id_carpool' => $carpoolId]);
        $remaining = $stmt->fetchColumn();

        if ($remaining == 0) {
            // tous les passagers ont validé → terminer le covoiturage
            $stmt = $pdo->prepare("UPDATE carpools SET id_status_carpool = 4 WHERE id_carpool = :id_carpool");
            $stmt->execute([':id_carpool' => $carpoolId]);

            // mettre aussi le chauffeur en Terminé
            $stmt = $pdo->prepare("UPDATE carpools_users
                                SET status_in_carpool = 'Terminé'
                                WHERE id_carpool = :id_carpool AND role_in_carpool = 'Chauffeur'
            ");
            $stmt->execute([':id_carpool' => $carpoolId]);
        }

        $pdo->commit();
        http_response_code(200);
        echo "Arrivés à destination";
        exit;
    }

    // Si chauffeur → uniquement visuel (pas de crédit, pas de maj BDD globale)
    if ($userCarpool['role_in_carpool'] === 'Chauffeur') {
        http_response_code(200);
        echo "Visuel uniquement";
        exit;
    }
}
