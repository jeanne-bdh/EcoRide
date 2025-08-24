<?php
require_once __DIR__ . "/../libs/pdo.php";
require_once __DIR__ . "/../libs/user.php";

$users = usersItems($pdo);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['userId'], $_POST['action'])) {
    $userId = (int)$_POST['userId'];
    $action = $_POST['action'];

    $success = false;
    if ($action === 'block') {
        $success = userSuspension($pdo, $userId);
    } elseif ($action === 'restart') {
        $success = userRestart($pdo, $userId);
    }

    header('Content-Type: application/json');
    echo json_encode([
        'success' => $success,
        'action' => $action,
        'userId' => $userId
    ]);
    exit;
}
