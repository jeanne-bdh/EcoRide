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
    <section>
        <?php
        if (!empty($carpools)) {

            /** @var \App\Entity\Carpools $carpool */
            foreach ($carpools as $carpool) {

                require APP_ROOT . '/templates/partials/carpool_card.php';
            }
        }
        ?>
    </section>

</main>

<?php require_once APP_ROOT . "/templates/partials/footer.php" ?>