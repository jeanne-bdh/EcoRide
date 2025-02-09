<?php require_once __DIR__ . "/../templates/header.php"; ?>

<section class="container-black">

    <!-- HERO SECTION -->
    <?php
    include_once __DIR__ . "/../templates/hero-section.php";
    heroSection("Détails du covoiturage");
    ?>

    <h2 id="date-details-covoit">Vendredi 14 février</h2>

    <div class="container-details-covoit">
        <div class="driver-infos">
            <div class="small-frame">
                <h5>Informations du véhicule</h5>
                <p>Marque : Renault</p>
                <p>Modèle : Captur</p>
                <p>Couleur : gris foncé</p>
                <p>Energie : thermique</p>
            </div>
            <div class="small-frame">
                <h5>Préférences du conducteur</h5>
                <p>Non fumeur</p>
                <p>Animaux en cage seulement</p>
                <p>Aime discuter de tout et de rien</p>
            </div>
            <div class="div-profil">
                <div>
                    <img src="/uploads/carpools/smiley-man.jpg" class="profil-icon" alt="profil user">
                </div>
                <p>Pseudo</p>
            </div>
            <div>
                <p>Avis (3)</p>
                <div class="carousel-slide">Carousel</div>
            </div>
        </div>
        <div class="long-frame">
            <div class="small-frame">
                <div class="div-depart">
                    <p>16:00</p>
                    <p>Paris</p>
                </div>
                <div class="travel-circle"></div>
                <hr class="travel-line">
                <p class="duree">2h</p>
                <hr class="travel-line">
                <div class="travel-circle"></div>
                <div class="div-arrivee">
                    <p>18:00</p>
                    <p>Lille</p>
                </div>
            </div>
            <div>
                <p>Type de voyage</p>
                <div class="tag-voyage">
                    <p>Non écolo</p>
                </div>
            </div>
            <div class="small-frame">
                <div class="place-restante">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="icons-details-carpool" viewBox="0 0 16 16">
                        <path d="M2.52 3.515A2.5 2.5 0 0 1 4.82 2h6.362c1 0 1.904.596 2.298 1.515l.792 1.848c.075.175.21.319.38.404.5.25.855.715.965 1.262l.335 1.679q.05.242.049.49v.413c0 .814-.39 1.543-1 1.997V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.338c-1.292.048-2.745.088-4 .088s-2.708-.04-4-.088V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.892c-.61-.454-1-1.183-1-1.997v-.413a2.5 2.5 0 0 1 .049-.49l.335-1.68c.11-.546.465-1.012.964-1.261a.8.8 0 0 0 .381-.404l.792-1.848ZM3 10a1 1 0 1 0 0-2 1 1 0 0 0 0 2m10 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2M6 8a1 1 0 0 0 0 2h4a1 1 0 1 0 0-2zM2.906 5.189a.51.51 0 0 0 .497.731c.91-.073 3.35-.17 4.597-.17s3.688.097 4.597.17a.51.51 0 0 0 .497-.731l-.956-1.913A.5.5 0 0 0 11.691 3H4.309a.5.5 0 0 0-.447.276L2.906 5.19Z" />
                    </svg>
                    <p>Place(s) restante(s)</p>
                    <p>2</p>
                </div>
                <div class="credit">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="icons-details-carpool" viewBox="0 0 16 16">
                        <path d="M4 9.42h1.063C5.4 12.323 7.317 14 10.34 14c.622 0 1.167-.068 1.659-.185v-1.3c-.484.119-1.045.17-1.659.17-2.1 0-3.455-1.198-3.775-3.264h4.017v-.928H6.497v-.936q-.002-.165.008-.329h4.078v-.927H6.618c.388-1.898 1.719-2.985 3.723-2.985.614 0 1.175.05 1.659.177V2.194A6.6 6.6 0 0 0 10.341 2c-2.928 0-4.82 1.569-5.244 4.3H4v.928h1.01v1.265H4v.928z" />
                    </svg>
                    <p>Crédit(s)</p>
                    <p>20</p>
                </div>
            </div>
            <a href="#" class="btn-login"><button>Participer</button></a>
        </div>
    </div>


</section>

<?php require_once __DIR__ . "/../templates/footer.php" ?>