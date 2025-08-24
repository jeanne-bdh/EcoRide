<?php

require_once dirname(__DIR__, 2) . "/templates/header.php";
require_once dirname(__DIR__, 2) . "/libs/pdo.php";
require_once dirname(__DIR__, 2) . "/libs/carpool.php";
require_once dirname(__DIR__, 2) . "/libs/review.php";
require_once dirname(__DIR__, 2) . "/processes/search_carpool_process.php";

?>

<main>

    <!-- HERO SECTION -->
    <?php
    include_once dirname(__DIR__, 2) . "/templates/hero_section.php";
    heroSection("Covoiturages");
    ?>

    <!-- ALL RESULT -->
    <section>
        <?php
        if (!empty($carpoolSearch)) {
            foreach ($carpoolSearch as $carpool) {
                $averageNotes = getAverageNotes($pdo, $carpool['id_users']);

                require __DIR__ . '/../../templates/carpool_card.php';
            }
        }
        ?>
    </section>

</main>

<?php require_once dirname(__DIR__, 2) . "/templates/footer.php" ?>