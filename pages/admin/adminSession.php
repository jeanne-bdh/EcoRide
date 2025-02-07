<?php

require_once __DIR__ . "/../lib/session.php";
require_once __DIR__ . "/../lib/pdo.php";
require_once __DIR__ . "/../templates/header.php";

?>

<section class="container-black">

    <!-- HERO SECTION -->
    <?php
    include_once __DIR__ . "/../templates/hero-section.php";
    heroSection("Espace Administrateur");
    ?>

    <div class="menu-session">
        <a href="/pages/admin/accountSuspension.php" class="card-session">
            <h3>Suspension de comptes</h3>
        </a>
        <a href="/pages/admin/createEmployeeSession.php" class="card-session">
            <h3>Créer les comptes</h3>
        </a>
        <a href="/pages/admin/graphCarpool.php" class="card-session">
            <h3>Graphique : Covoiturage par jour</h3>
        </a>
        <a href="/pages/admin/graphCredit.php" class="card-session">
            <h3>Graphique : Total crédit</h3>
        </a>
    </div>

</section>

<?php require_once __DIR__ . "/../templates/footer.php" ?>