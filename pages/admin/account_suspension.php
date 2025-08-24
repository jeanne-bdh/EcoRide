<?php

require_once dirname(__DIR__, 2) . "/templates/header.php";
require_once dirname(__DIR__, 2) . "/processes/status_session_process.php";

?>

<main>

    <!-- HERO SECTION -->
    <?php
    include_once dirname(__DIR__, 2) . "/templates/hero_section.php";
    heroSection("Suspension de comptes");
    ?>

    <!-- USERS LIST -->
    <table>
        <thread>
            <th>ID</th>
            <th>Pseudo</th>
            <th>Email</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Statut</th>
            <th>Action</th>
        </thread>
        <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= htmlspecialchars($user['id_users']); ?></td>
                    <td><?= htmlspecialchars($user['pseudo']); ?></td>
                    <td><?= htmlspecialchars($user['email']); ?></td>
                    <td><?= htmlspecialchars($user['lastname']) ?? ''; ?></td>
                    <td><?= htmlspecialchars($user['firstname']) ?? ''; ?></td>
                    <td><?= ($user['id_status_session'] ? 'Actif' : 'Suspendu'); ?></td>
                    <td>
                        <button class="<?= $user['id_status_session'] == 1 ? 'btn-red' : 'btn-blue' ?>"
                            data-user-id="<?= $user['id_users'] ?>"
                            data-status="<?= $user['id_status_session'] ?>">
                            <?= $user['id_status_session'] == 1 ? 'Bloquer' : 'Réactiver' ?>
                        </button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</main>

<?php require_once dirname(__DIR__, 2) . "/templates/footer.php" ?>