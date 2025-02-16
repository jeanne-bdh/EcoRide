<?php

require_once __DIR__ . "/../../templates/header.php";

?>

<section class="container-black">

    <!-- HERO SECTION -->
    <?php
    include_once __DIR__ . "/../../templates/hero_section.php";
    heroSection("Modifications du profil");
    ?>

    </div>

    <div class="container-form" id="container-form-profil">
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
    </div>

</section>

<?php require_once __DIR__ . "/../../templates/footer.php" ?>