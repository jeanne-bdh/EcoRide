<?php

require_once dirname(__DIR__, 2) . "/templates/header.php";
require_once dirname(__DIR__, 2) . "/libs/pdo.php";
require_once dirname(__DIR__, 2) . "/libs/search_carpool.php";
require_once dirname(__DIR__, 2) . "/libs/review.php";

?>

<main>

    <!-- HERO SECTION -->
    <?php
    include_once dirname(__DIR__, 2) . "/templates/hero_section.php";
    heroSection("Accès aux covoiturages");
    ?>

    <!-- FILTERS -->
    <form class="form-filters">
        <div class="form-content">
            <label>
                <input type="checkbox" name="electrique" />
                🌱 Trajets écologiques
            </label>
        </div>

        <div class="form-content">
            <label for="prix">Prix maximum (€)</label>
            <input type="number" id="prix" name="prix_max" min="0" placeholder="ex : 20" />
        </div>

        <div class="form-content">
            <label for="duree">Durée maximum (en minutes)</label>
            <input type="number" id="duree" name="duree_max" min="1" placeholder="ex : 90" />
        </div>

        <div class="form-content">
            <label for="note">Note minimale du conducteur</label>
            <div class="custom-select-checkbox">
                <div class="select-box">Sélectionner</div>
                <div class="checkbox-options">
                    <label><input type="checkbox" name="note" value="5" /> ⭐⭐⭐⭐⭐</label>
                    <label><input type="checkbox" name="note" value="4" /> ⭐⭐⭐⭐ et plus</label>
                    <label><input type="checkbox" name="note" value="3" /> ⭐⭐⭐ et plus</label>
                    <label><input type="checkbox" name="note" value="2" /> ⭐⭐ et plus</label>
                    <label><input type="checkbox" name="note" value="1" /> ⭐ et plus</label>
                </div>
            </div>
        </div>

        <button type="submit">Appliquer les filtres</button>
    </form>

    <section class="container-carpools-visitors">
        <?php
        $carpoolId = (int)$_GET["id_carpool"];
        $carpoolSearch = getSearchCarpoolCard($pdo, $carpoolId);

        foreach ($carpoolSearch as $key => $carpool) {
            require __DIR__ . '/../../templates/carpool_card.php';
        } ?>
    </section>

</main>

<?php require_once dirname(__DIR__, 2) . "/templates/footer.php" ?>