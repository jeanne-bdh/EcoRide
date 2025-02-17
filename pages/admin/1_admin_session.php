<?php

require_once __DIR__ . "/../../templates/header.php";

?>

<main>

    <!-- HERO SECTION -->
    <?php
    include_once __DIR__ . "/../../templates/hero_section.php";
    heroSection("Espace Administrateur");
    ?>

    <section class="menu-session">
        <a href="/pages/admin/2.1_account_suspension.php" class="card-session">
            <h3>Suspension de comptes</h3>
        </a>
        <a href="/pages/admin/2.2_create_employee_session.php" class="card-session">
            <h3>Créer les comptes employés</h3>
        </a>
        <a href="/pages/admin/2.3_graph_carpool.php" class="card-session">
            <h3>Graphique : Covoiturage par jour</h3>
        </a>
        <a href="/pages/admin/2.4_graph_credit.php" class="card-session">
            <h3>Graphique : Total crédit</h3>
        </a>
    </section>

</main>

<?php require_once __DIR__ . "/../../templates/footer.php" ?>