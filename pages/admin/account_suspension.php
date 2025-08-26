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
                    <td id="label-status-<?= $user['id_users'] ?>"><?= htmlspecialchars($user['label_status_session']); ?></td>
                    <td>
                        <?php if ($user['label_status_session'] === 'Actif') : ?>
                            <button class="btn-red" id="btn-status-<?= $user['id_users'] ?>" type="button" onclick="statusSession(<?= $user['id_users'] ?>)">Bloquer</button>
                        <?php elseif ($user['label_status_session'] === 'Suspendu') : ?>
                            <button class="btn-blue" id="btn-status-<?= $user['id_users'] ?>" type="button" onclick="statusSession(<?= $user['id_users'] ?>)">Réactiver</button>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</main>

<?php require_once dirname(__DIR__, 2) . "/templates/footer.php" ?>