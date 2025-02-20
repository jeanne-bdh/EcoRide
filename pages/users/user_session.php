<?php

require_once dirname(__DIR__,2) . "/templates/header.php";
require_once dirname(__DIR__,2) . "/libs/pdo.php";

?>

<main>

    <!-- HERO SECTION -->
    <?php
    include_once dirname(__DIR__,2) . "/templates/hero_section.php";
    heroSection("Espace utilisateur");
    ?>

    <section class="menu-session">
        <a href="/pages/users/new-carpool/new_carpool.php" class="card-session">
            <h3>Saisir un voyage</h3>
        </a>
        <a href="/pages/users/hist-carpool/hist_carpool.php" class="card-session">
            <h3>Historique <br> des covoiturages</h3>
        </a>
        <a href="/pages/users/infos-profil/infos_profil.php" class="card-session">
            <h3>Modifications <br> du profil</h3>
        </a>
    </section>

</main>

<?php require_once dirname(__DIR__,2) . "/templates/footer.php" ?>