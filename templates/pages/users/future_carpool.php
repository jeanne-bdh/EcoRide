<?php

require_once APP_ROOT . "/templates/partials/header.php";

?>

<main>

    <!-- HERO SECTION -->
    <?php
    include_once APP_ROOT . "/templates/partials/hero_section.php";
    heroSection("Covoiturages à venir");
    ?>

    <?php if (!empty($carpools)) : ?>
        <?php foreach ($carpools as $carpool): ?>
            <?php require APP_ROOT . "/templates/partials/carpool_card.php"; ?>
        <?php endforeach; ?>
    <?php else: ?>
            <p class="p-no-carpool">❌ Aucun covoiturage à venir</p>
<?php endif; ?>

</main>

<?php require_once APP_ROOT . "/templates/partials/footer.php" ?>