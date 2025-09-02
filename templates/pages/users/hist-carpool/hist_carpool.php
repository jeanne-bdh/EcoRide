<?php

require_once dirname(__DIR__, 3) . "/templates/partials/header.php";
require_once dirname(__DIR__, 3) . "/libs/pdo.php";
require_once dirname(__DIR__, 3) . "/libs/carpool.php";
require_once dirname(__DIR__, 3) . "/libs/review.php";

?>

<main>

    <!-- HERO SECTION -->
    <?php
    include_once dirname(__DIR__, 3) . "/templates/partials/hero_section.php";
    heroSection("Covoiturages passés");

    if (isUserConnected()) {
        $carpools = getPastCarpoolByUser($pdo, $_SESSION['users']['id_users']);

        if ($carpools) {
            $pastCarpool = false;
            foreach ($carpools as $carpool) {
                $pastCarpool = true;
                $averageNotes = getAverageNotes($pdo, $carpool['id_users']);

                require dirname(__DIR__, 3) . "/templates/carpool_card.php";
            }

            if (!$pastCarpool) { ?>
                <p class="p-no-carpool">❌ Aucun covoiturage passés</p>
            <?php } ?>
        <?php } else { ?>
            <p class="p-no-carpool">❌ Aucun covoiturage passés</p>
        <?php } ?>
    <?php } ?>

</main>

<?php require_once dirname(__DIR__, 3) . "/templates/partials/footer.php" ?>