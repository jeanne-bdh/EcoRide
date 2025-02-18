<?php

require_once __DIR__ . "/../../templates/header.php";

?>

<main>

    <!-- HERO SECTION -->
    <?php
    include_once __DIR__ . "/../../templates/hero_section.php";
    heroSection("Historique des covoiturages");
    ?>

    <section class="menu-session">
        <a href="/pages/users/past_carpool.php" class="card-session">
            <h3>Covoiturages passés</h3>
        </a>
        <a href="/pages/users/future_carpool.php" class="card-session">
            <h3>Covoiturages à venir</h3>
        </a>
    </section>

</main>

<?php require_once __DIR__ . "/../../templates/footer.php" ?>