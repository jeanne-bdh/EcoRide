<?php

require_once APP_ROOT . "/templates/partials/header.php";

?>

<main>

    <!-- HERO SECTION -->
    <?php
    include_once APP_ROOT . "/templates/partials/hero_section.php";
    heroSection("Covoiturages");
    ?>

    <!-- ALL RESULT -->
    <section">
        <?php
        $cityDepart = $_GET["departCity"] ?? '';
        $cityArrival = $_GET["arrivalCity"] ?? '';
        $dateDepart = $_GET["dateDepart"] ?? '';

        if ($cityDepart && $cityArrival && $dateDepart) {
            $carpoolSearch = getSearchCarpoolCard($pdo, $cityDepart, $cityArrival, $dateDepart);

            foreach ($carpoolSearch as $carpool) {

                //$averageNotes = getAverageNotes($pdo, $carpool['id_users']);

                require APP_ROOT . '/templates/partials/carpool_card.php';
            }
        }
        ?>
    </section>

</main>

<?php require_once APP_ROOT . "/templates/partials/footer.php" ?>