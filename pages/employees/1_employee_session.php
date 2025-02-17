<?php

require_once __DIR__ . "/../../templates/header.php";

?>

<main>

    <!-- HERO SECTION -->
    <?php
    include_once __DIR__ . "/../../templates/hero_section.php";
    heroSection("Espace employé");
    ?>

    <section class="menu-session">
        <a href="/pages/employees/2.1_comments.php" class="card-session">
            <h3>Valider les avis</h3>
        </a>
        <a href="/pages/employees/2.2_bad_carpool.php" class="card-session">
            <h3>Covoiturages <br> mal passés</h3>
        </a>
    </section>

</main>

<?php require_once __DIR__ . "/../../templates/footer.php" ?>