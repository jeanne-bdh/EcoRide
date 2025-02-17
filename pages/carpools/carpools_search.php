<?php

require_once __DIR__ . "/../../templates/header.php";
require_once __DIR__ . "/../../libs/pdo.php";
require_once __DIR__ . "/../../libs/carpool.php";

?>

<main>

    <!-- HERO SECTION -->
    <?php
    include_once __DIR__ . "/../../templates/hero_section.php";
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

    <div class="container-carpool-visitor">
        <?php
        $carpoolsSearch = getCarpoolBySearch($pdo);

        foreach ($carpoolsSearch as $key => $carpoolSearch) {
            require __DIR__ . '/../../templates/carpool_card_visitor.php';
        } ?>
    </div>

</main>

<?php require_once __DIR__ . "/../../templates/footer.php" ?>