<?php

require_once dirname(__DIR__,2) . "/templates/header.php";

?>

<main>

    <!-- HERO SECTION -->
    <?php
    include_once dirname(__DIR__,2) . "/templates/hero_section.php";
    heroSection("Espace Administrateur");
    ?>

    <section class="menu-session">
        <a href="/pages/admin/account_suspension.php" class="card-session">
            <h3>Suspension <br> de comptes</h3>
        </a>
        <a href="/pages/admin/create_employee_session.php" class="card-session">
            <h3>Créer les comptes <br> employés</h3>
        </a>
        <a href="/pages/admin/graph_carpool.php" class="card-session">
            <h3>Graphique : <br> Covoiturage par jour</h3>
        </a>
        <a href="/pages/admin/graph_credit.php" class="card-session">
            <h3>Graphique : <br> Total crédit</h3>
        </a>
    </section>

</main>

<?php require_once dirname(__DIR__,2) . "/templates/footer.php" ?>