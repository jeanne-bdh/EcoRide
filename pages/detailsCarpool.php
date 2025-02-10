<?php require_once __DIR__ . "/../templates/header.php"; ?>

<section class="container-black">

    <!-- HERO SECTION -->
    <?php
    include_once __DIR__ . "/../templates/hero-section.php";
    heroSection("Détails du covoiturage");
    ?>

    <h2 id="date-details-covoit">Vendredi 14 février</h2>

    <div class="container-carpool-details">
        <div>
            <div class="middle-frame" id="car-infos">
                <h5>Informations du véhicule</h5>
                <ul>
                    <li>Marque : Renault</li>
                    <li>Modèle : Captur</li>
                    <li>Couleur : gris foncé</li>
                    <li>Energie : thermique</li>
                </ul>
            </div>
            <div class="middle-frame">
                <h5>Préférences du conducteur</h5>
                <ul>
                    <li>Non fumeur</li>
                    <li>Animaux en cage seulement</li>
                    <li>Aime discuter de tout et de rien</li>
                </ul>
            </div>
            <div class="profil-container">
                <img src="/uploads/carpools/smiley-man.jpg" alt="profil user">
                <h4>Pseudo</h4>
            </div>
            <div class="comment-container">
                <h4>Avis (3)</h4>

                <div class="carousel">
                    <div class="carousel-slide">
                        <div class="slide">
                            <h5>Trajet parfait avec un conducteur très sympa !</h5>
                            <p>5 étoiles</p>
                            <p>Super expérience de covoiturage ! Paul est arrivé à l’heure et la voiture était impeccable. Il a proposé plusieurs pauses pendant le trajet, et la conversation était fluide et agréable. Je recommande vivement de voyager avec lui !</p>
                        </div>
                        <div class="slide">
                            <h5>Très bon trajet, petit retard au départ</h5>
                            <p>4 étoiles</p>
                            <p>Le trajet s'est bien déroulé, et le conducteur était très agréable. Petit bémol : 10 minutes de retard au départ, mais il a pris la peine de prévenir à l'avance, ce que j'ai apprécié. Voiture confortable et bonne ambiance à bord !</p>
                        </div>
                        <div class="slide">
                            <h5>Correct, mais peut s'améliorer</h5>
                            <p>3 étoiles</p>
                            <p>Conducteur sympa, mais la musique était un peu forte pendant tout le trajet malgré mes suggestions. Aussi, pas de pause sur une longue distance, ce qui était un peu inconfortable. Mais la conduite était sécurisante et ponctuelle.</p>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>

            </div>
        </div>
        <div class="long-frame">
            <div class="small-frame container-details-travel">
                <div class="travel-infos">
                    <div class="travel-details">
                        <p>16:00</p>
                        <p>2h</p>
                        <p>18:00</p>
                    </div>
                    <div class="travel-line">
                        <div class="circle"></div>
                        <hr class="line">
                        <div class="circle"></div>
                    </div>
                    <div class="travel-details">
                        <p>Paris</p>
                        <p>Lille</p>
                    </div>
                </div>
                <div class="tag-voyage">
                    <p>Non écolo</p>
                </div>
            </div>
            <div class="small-frame">
                <div class="container-seat-credit">
                    <div class="infos-seat-credit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="icons-details-carpool" viewBox="0 0 16 16">
                            <path d="M2.52 3.515A2.5 2.5 0 0 1 4.82 2h6.362c1 0 1.904.596 2.298 1.515l.792 1.848c.075.175.21.319.38.404.5.25.855.715.965 1.262l.335 1.679q.05.242.049.49v.413c0 .814-.39 1.543-1 1.997V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.338c-1.292.048-2.745.088-4 .088s-2.708-.04-4-.088V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.892c-.61-.454-1-1.183-1-1.997v-.413a2.5 2.5 0 0 1 .049-.49l.335-1.68c.11-.546.465-1.012.964-1.261a.8.8 0 0 0 .381-.404l.792-1.848ZM3 10a1 1 0 1 0 0-2 1 1 0 0 0 0 2m10 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2M6 8a1 1 0 0 0 0 2h4a1 1 0 1 0 0-2zM2.906 5.189a.51.51 0 0 0 .497.731c.91-.073 3.35-.17 4.597-.17s3.688.097 4.597.17a.51.51 0 0 0 .497-.731l-.956-1.913A.5.5 0 0 0 11.691 3H4.309a.5.5 0 0 0-.447.276L2.906 5.19Z" />
                        </svg>
                        <p>Place(s) restante(s)</p>
                    </div>
                    <p>2</p>
                    <div class="infos-seat-credit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="icons-details-carpool" viewBox="0 0 16 16">
                            <path d="M4 9.42h1.063C5.4 12.323 7.317 14 10.34 14c.622 0 1.167-.068 1.659-.185v-1.3c-.484.119-1.045.17-1.659.17-2.1 0-3.455-1.198-3.775-3.264h4.017v-.928H6.497v-.936q-.002-.165.008-.329h4.078v-.927H6.618c.388-1.898 1.719-2.985 3.723-2.985.614 0 1.175.05 1.659.177V2.194A6.6 6.6 0 0 0 10.341 2c-2.928 0-4.82 1.569-5.244 4.3H4v.928h1.01v1.265H4v.928z" />
                        </svg>
                        <p>Crédit(s)</p>
                    </div>
                    <p>20</p>
                </div>
            </div>
            <a href="#"><button class="btn-blue btn-details-carpool">Participer</button></a>
        </div>
    </div>


</section>

<?php require_once __DIR__ . "/../templates/footer.php" ?>