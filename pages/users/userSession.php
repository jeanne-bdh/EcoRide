<?php

require_once __DIR__ . "/../lib/session.php";
require_once __DIR__ . "/../lib/pdo.php";
require_once __DIR__ . "/../templates/header.php";

?>

<section class="container-black">

    <!-- HERO SECTION -->
    <?php
    include_once __DIR__ . "/../templates/hero-section.php";
    heroSection("Espace utilisateur");
    ?>

    <div class="menu-session">
        <a href="/pages/users/newCarpool.php" class="card-session">
            <h3>Saisir un voyage</h3>
        </a>
        <a href="/pages/users/histCarpool.php" class="card-session">
            <h3>Historique <br> des covoiturages</h3>
        </a>
        <a href="/pages/users/infosProfil.php" class="card-session">
            <h3>Modifications <br> du profil</h3>
        </a>
    </div>

</section>

<?php require_once __DIR__ . "/../templates/footer.php" ?>