<?php

require_once dirname(__DIR__, 2) . "/templates/header.php";
require_once dirname(__DIR__, 2) . "/libs/pdo.php";
require_once dirname(__DIR__, 2) . "/libs/review.php";
require_once dirname(__DIR__, 2) . "/libs/carpool.php";

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
                <input type="checkbox" name="ecolo" />
                🌱 Trajets écologiques
            </label>
        </div>

        <div class="form-content">
            <label for="price-filter">Prix maximum (€)</label>
            <input class="inputNumberType" type="number" id="price-filter" name="maxPrice" min="0" placeholder="ex : 20" />
        </div>

        <div class="form-content">
            <label for="duration-filter">Durée maximum (en minutes)</label>
            <input class="inputNumberType" type="number" id="duration-filter" name="maxDuration" min="1" placeholder="ex : 90" />
        </div>

        <div class="form-content">
            <label for="note-5">Note minimale du conducteur</label>
            <div class="custom-select-checkbox" onclick="this.classList.toggle('open')">
                <div class="select-box">Sélectionner</div>
                <div class="checkbox-options">
                    <label for="note-5"><input type="checkbox" name="note" id="note-5" value="5" /> ⭐⭐⭐⭐⭐</label>
                    <label for="note-4"><input type="checkbox" name="note" id="note-4" value="4" /> ⭐⭐⭐⭐ et plus</label>
                    <label for="note-3"><input type="checkbox" name="note" id="note-3" value="3" /> ⭐⭐⭐ et plus</label>
                    <label for="note-2"><input type="checkbox" name="note" id="note-2" value="2" /> ⭐⭐ et plus</label>
                    <label for="note-1"><input type="checkbox" name="note" id="note-1" value="1" /> ⭐ et plus</label>
                </div>
            </div>
        </div>
        <div class="inputBtn">
            <button class="btn-blue btn-green" type="submit">Appliquer les filtres</button>
        </div>
    </form>

    <section class="carpool_card_vistor">
        <?php
        $cityDepart = $_GET["departCity"] ?? '';
        $cityArrival = $_GET["arrivalCity"] ?? '';
        $dateDepart = $_GET["dateDepart"] ?? '';

        if ($cityDepart && $cityArrival && $dateDepart) {
            $carpoolSearch = getSearchCarpoolCard($pdo, $cityDepart, $cityArrival, $dateDepart);

            foreach ($carpoolSearch as $carpool) {

                $averageNotes = getAverageNotes($pdo, $carpool['id_users']);

                require __DIR__ . '/../../templates/carpool_card.php';
            }
        } else {
            echo "<p>Veuillez renseigner tous les paramètres de recherche.</p>";
        } ?>
    </section>

</main>

<?php require_once dirname(__DIR__, 2) . "/templates/footer.php" ?>