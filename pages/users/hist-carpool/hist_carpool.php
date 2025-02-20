<?php

require_once dirname(__DIR__, 3) . "/templates/header.php";

?>

<main>

    <!-- HERO SECTION -->
    <?php
    include_once dirname(__DIR__, 3) . "/templates/hero_section.php";
    heroSection("Historique des covoiturages");
    ?>

    <section class="menu-session">
        <a href="/pages/users/hist-carpool/past_carpool.php" class="card-session">
            <h3>Covoiturages passés</h3>
        </a>
        <a href="/pages/users/hist-carpool/future_carpool.php" class="card-session">
            <h3>Covoiturages à venir</h3>
        </a>
    </section>

</main>

<?php require_once dirname(__DIR__, 3) . "/templates/footer.php" ?>