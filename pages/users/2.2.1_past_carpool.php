<?php

require_once __DIR__ . "/../../templates/header.php";
require_once __DIR__ . "/../../libs/pdo.php";
require_once __DIR__ . "/../../libs/carpool.php";

?>

<section class="container-black">

    <!-- HERO SECTION -->
    <?php
    include_once __DIR__ . "/../../templates/hero_section.php";
    heroSection("Covoiturages passés");

    if (isset($_SESSION['users'])) {
        $carpools = getPastCarpoolByUser($pdo, $_SESSION['users']['id_users']);

        if ($carpools) {
            $pastCarpool = false;
            foreach ($carpools as $carpool) {
                $pastCarpool = true;

                require __DIR__ . "/../../templates/carpool-card.php";
            }

            if (!$pastCarpool) { ?>
                <p>Aucun covoiturage passés</p>
            <?php } ?>
        <?php } else { ?>
            <p>Aucun covoiturage passés</p>
        <?php } ?>
    <?php } ?>

</section>

<?php require_once __DIR__ . "/../../templates/footer.php" ?>