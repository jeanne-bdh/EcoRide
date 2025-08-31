<?php

require_once APP_ROOT . "/templates/partials/header.php";
//require_once dirname(__DIR__, 2) . "/processes/search_carpool_process.php";

?>

<main>

    <!-- HERO SECTION -->
    <?php
    include_once APP_ROOT . "/templates/partials/hero_section.php";
    heroSection("La mobilité partagée au
    service de la planète");
    ?>

    <!-- FORMULAIRE -->
    <?php
    require_once APP_ROOT . "/templates/partials/form_home.php";
    ?>

    <!-- MAIN SECTION -->
    <section class="main-section">
        <div class="img-main-section">
            <img class="illust-home" src="/assets/images/home/illustration-accueil.svg" alt="Illustration de covoiturage pour page d'accueil">
        </div>
        <div class="text-access-carpool">
            <h2>Trouvez le covoiturage près de chez vous</h2>
        </div>

    </section>

</main>

<?php require_once APP_ROOT . "/templates/partials/footer.php" ?>