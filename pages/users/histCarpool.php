<?php

require_once __DIR__ . "/../templates/header.php";

?>

<section class="container-black">

    <!-- HERO SECTION -->
    <?php
    include_once __DIR__ . "/../templates/hero-section.php";
    heroSection("Historique des covoiturages");
    ?>

<div class="menu-session">
        <a href="/pages/users/oldCarpool.php" class="card-session">
            <h3>Covoiturages passés</h3>
        </a>
        <a href="/pages/users/futureCarpool.php" class="card-session">
            <h3>Covoiturages à venir</h3>
        </a>
    </div>

</section>

<?php require_once __DIR__ . "/../templates/footer.php" ?>