<?php

require_once dirname(__DIR__, 3) . "/templates/header.php";
require_once dirname(__DIR__, 3) . "/libs/pdo.php";
require_once dirname(__DIR__, 3) . "/libs/carpool.php";

?>

<main>

    <!-- HERO SECTION -->
    <?php
    include_once dirname(__DIR__, 3) . "/templates/hero_section.php";
    heroSection("Covoiturages passés");

    if (isUserConnected()) {
        $carpools = getPastCarpoolByUser($pdo, $_SESSION['users']['id_users']);

        if ($carpools) {
            $pastCarpool = false;
            foreach ($carpools as $carpool) {
                $pastCarpool = true;

                require dirname(__DIR__, 3) . "/templates/carpool_card_user.php";
            }

            if (!$pastCarpool) { ?>
                <p>Aucun covoiturage passés</p>
            <?php } ?>
        <?php } else { ?>
            <p>Aucun covoiturage passés</p>
        <?php } ?>
    <?php } ?>

</main>

<?php require_once dirname(__DIR__, 3) . "/templates/footer.php" ?>