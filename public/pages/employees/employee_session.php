<?php

require_once dirname(__DIR__,2) . "/templates/header.php";

?>

<main>

    <!-- HERO SECTION -->
    <?php
    include_once dirname(__DIR__,2) . "/templates/hero_section.php";
    heroSection("Espace employé");
    ?>

    <section class="menu-session">
        <a href="/pages/employees/comments.php" class="card-session">
            <h3>Valider les avis</h3>
        </a>
        <a href="/pages/employees/carpool_incidents.php" class="card-session">
            <h3>Incidents covoiturages</h3>
        </a>
    </section>

</main>

<?php require_once dirname(__DIR__,2) . "/templates/footer.php" ?>