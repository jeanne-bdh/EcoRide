<?php

require_once dirname(__DIR__,2) . "/templates/header.php";
require_once dirname(__DIR__,2) . "/libs/pdo.php";
require_once dirname(__DIR__,2) . "/libs/carpool.php";
require_once dirname(__DIR__,2) . "/libs/format_time.php";

?>

<main>

    <!-- HERO SECTION -->
    <?php
    include_once dirname(__DIR__,2) . "/templates/hero_section.php";
    heroSection("Accès aux covoiturages");
    ?>

    <!-- FILTERS -->
    <div class="form-filters">
        <select class="form-select" id="floatingSelect" aria-label="Sélectionner des filtres">
            <option selected>Open this select menu</option>
            <option value="1">One</option>
            <option value="2">Two</option>
            <option value="3">Three</option>
        </select>
        <label for="floatingSelect">Works with selects</label>
    </div>

    <section class="container-carpools-visitors">
        <?php
        $carpoolsSearch = getCarpoolBySearch($pdo);

        foreach ($carpoolsSearch as $key => $carpoolSearch) {
            require __DIR__ . '/../../templates/carpool_card_visitor.php';
        } ?>
    </section>

</main>

<?php require_once dirname(__DIR__,2) . "/templates/footer.php" ?>