<?php

require_once __DIR__ . "/../../libs/session.php";
require_once __DIR__ . "/../../libs/pdo.php";
require_once __DIR__ . "/../../templates/header.php";

?>

<section class="container-black">

    <!-- HERO SECTION -->
    <?php
    include_once __DIR__ . "/../../templates/hero_section.php";
    heroSection("Espace utilisateur");
    ?>

    <div class="menu-session">
        <a href="/pages/users/2.1_new_carpool.php" class="card-session">
            <h3>Saisir un voyage</h3>
        </a>
        <a href="/pages/users/2.2_hist_carpool.php" class="card-session">
            <h3>Historique <br> des covoiturages</h3>
        </a>
        <a href="/pages/users/2.3_infos_profil.php" class="card-session">
            <h3>Modifications <br> du profil</h3>
        </a>
    </div>

</section>

<?php require_once __DIR__ . "/../../templates/footer.php" ?>