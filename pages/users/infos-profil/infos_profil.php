<?php

require_once dirname(__DIR__, 3) . "/templates/header.php";

?>

<main>

    <!-- HERO SECTION -->
    <?php
    include_once dirname(__DIR__, 3) . "/templates/hero_section.php";
    heroSection("Modifications du profil");
    ?>

    <section class="container-form" id="container-form-profil">
        <form action="">
            <div>
                <div class="inputForm">
                    <label for="">Nom</label>
                    <input type="text">
                </div>
                <div class="inputForm">
                    <label for="">Prénom</label>
                    <input type="text">
                </div>
                <div class="inputForm">
                    <label for="">Adresse</label>
                    <input type="text">
                </div>
                <div class="inputForm">
                    <label for="">Téléphone</label>
                    <input type="text">
                </div>
                <div class="inputForm">
                    <label for="">Préférences</label>
                    <textarea type="text" name="" id=""></textarea>
                </div>
            </div>
            <div>
                <div class="inputForm">
                    <label for="">Marque</label>
                    <input type="text">
                </div>
                <div class="inputForm">
                    <label for="">Modèle</label>
                    <input type="text">
                </div>
                <div class="inputForm">
                    <label for="">Immatriculation</label>
                    <input type="text">
                </div>
                <div class="inputForm">
                    <label for="">Date de la 1ère immatriculation</label>
                    <input type="date">
                </div>
                <div class="inputForm">
                    <label for="">Nombre de places</label>
                    <input type="text">
                </div>
            </div>
            <div class="inputBtn">
                <button type="submit" class="btn-blue">Enregistrer</button>
            </div>
        </form>
    </section>

</main>

<?php require_once dirname(__DIR__, 3) . "/templates/footer.php" ?>