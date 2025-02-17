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
        <a href="/pages/users/2.2.1_past_carpool.php" class="card-session">
            <h3>Covoiturages passés</h3>
        </a>
        <a href="/pages/users/2.2.2_future_carpool.php" class="card-session">
            <h3>Covoiturages à venir</h3>
        </a>
    </section>

</main>

<?php require_once __DIR__ . "/../../templates/footer.php" ?>