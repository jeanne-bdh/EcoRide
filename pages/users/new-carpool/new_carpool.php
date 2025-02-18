<?php

require_once dirname(__DIR__, 3) . "/templates/header.php";

?>

<main>

    <!-- HERO SECTION -->
    <?php
    include_once dirname(__DIR__, 3) . "/templates/hero_section.php";
    heroSection("Saisir un voyage");
    ?>

</main>

<?php require_once dirname(__DIR__, 3) . "/templates/footer.php" ?>