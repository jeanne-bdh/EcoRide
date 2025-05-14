<?php

require_once dirname(__DIR__, 3) . "/templates/header.php";
require_once dirname(__DIR__, 3) . "/libs/pdo.php";
require_once dirname(__DIR__, 3) . "/libs/carpool.php";
require_once dirname(__DIR__, 3) . "/libs/review.php";

?>

<main>

    <!-- HERO SECTION -->
    <?php
    include_once dirname(__DIR__, 3) . "/templates/hero_section.php";
    heroSection("Covoiturages à venir");

    if (isUserConnected()) {
        $carpools = getFutureCarpoolByUser($pdo, $_SESSION['users']['id_users']);

        if ($carpools) {
            $futureCarpool = false;
            foreach ($carpools as $carpool) {
                $futureCarpool = true;
                $averageNotes = getAverageNotes($pdo, $carpool['id_users']);

                require __DIR__ . "/future_carpool_card.php";
            }

            if (!$futureCarpool) { ?>
                <p class="p-no-carpool">❌ Aucun covoiturage à venir</p>
            <?php } ?>
        <?php } else { ?>
            <p class="p-no-carpool">❌ Aucun covoiturage à venir</p>
        <?php } ?>
    <?php } ?>

</main>

<?php require_once dirname(__DIR__, 3) . "/templates/footer.php" ?>