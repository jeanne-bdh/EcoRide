<?php

require_once dirname(__DIR__,2) . "/templates/header.php";

?>

<main>

    <!-- HERO SECTION -->
    <?php
    include_once dirname(__DIR__,2) . "/templates/hero_section.php";
    heroSection("Valider les avis");
    ?>

</main>

<?php require_once dirname(__DIR__,2) . "/templates/footer.php" ?>