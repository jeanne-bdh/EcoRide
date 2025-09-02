<?php

require_once APP_ROOT . "/templates/partials/header.php";

?>

<main>

    <!-- HERO SECTION -->
    <?php
    include_once APP_ROOT . "/templates/partials/hero_section.php";
    heroSection("Suspension de comptes");
    ?>

    <!-- USERS LIST -->
    <table>
        <thead>
            <th>ID</th>
            <th>Pseudo</th>
            <th>Email</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Statut</th>
            <th>Action</th>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= htmlspecialchars($user->getIdUsers()); ?></td>
                    <td><?= htmlspecialchars($user->getPseudo()); ?></td>
                    <td><?= htmlspecialchars($user->getEmail()); ?></td>
                    <td><?= htmlspecialchars($user->getLastname()) ?? ''; ?></td>
                    <td><?= htmlspecialchars($user->getFirstname()) ?? ''; ?></td>
                    <td id="label-status-<?= $user->getIdUsers(); ?>"><?= htmlspecialchars($user->getStatusSession()->getLabelStatusSession()); ?></td>
                    <td>
                        <?php if ($user->getStatusSession()->getLabelStatusSession() === 'Actif') : ?>
                            <button class="btn-red" id="btn-status-<?= $user->getIdUsers(); ?>" type="button" onclick="statusSession(<?= $user->getIdUsers(); ?>)">Bloquer</button>
                        <?php elseif ($user->getStatusSession()->getLabelStatusSession() === 'Suspendu') : ?>
                            <button class="btn-blue" id="btn-status-<?= $user->getIdUsers(); ?>" type="button" onclick="statusSession(<?= $user->getIdUsers(); ?>)">Réactiver</button>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</main>

<?php require_once APP_ROOT . "/templates/partials/footer.php" ?>