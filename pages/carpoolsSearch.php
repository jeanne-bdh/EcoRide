<?php

require_once __DIR__ . "/../templates/header.php";
require_once __DIR__ . "/../libs/pdo.php";
require_once __DIR__ . "/../libs/carpool.php";

?>

<section class="container-black">

    <!-- HERO SECTION -->
    <?php
    include_once __DIR__ . "/../templates/hero-section.php";
    heroSection("Accès aux covoiturages");

    $carpoolsSearch = getCarpoolBySearch();

    foreach ($carpoolsSearch as $key => $carpoolSearch) {
        require __DIR__ . '/../templates/carpool_card_visitor.php';
    } ?>

</section>

<?php require_once __DIR__ . "/../templates/footer.php" ?>