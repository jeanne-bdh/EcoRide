
    <div class="carpool-card">
        <div class="carpool-card-top">
            <div class="blue-tag">
                <p><?= $carpoolSearch['date_depart']; ?></p>
            </div>
            <div>
                <p class="p-credit"><?= $carpoolSearch['price']; ?> crédit(s)</p>
                <p class="p-place"><?= $carpoolSearch['remaining_seat']; ?> place(s)</p>
            </div>
        </div>
        <div class="travel">
            <div class="container-depart">
                <p><?= (new DateTime($carpoolSearch['time_depart']))->format('G\hi'); ?></p>
                <p><?= $carpoolSearch['localisation_depart']; ?></p>
            </div>
            <div class="travel-circle"></div>
            <hr class="travel-line">
            <p class="duree"><?= (new DateTime($carpoolSearch['duration']))->format('G\h'); ?></p>
            <hr class="travel-line">
            <div class="travel-circle"></div>
            <div class="container-arrivee">
                <p><?= (new DateTime($carpoolSearch['time_arrival']))->format('G\hi'); ?></p>
                <p><?= $carpoolSearch['localisation_arrival']; ?></p>
            </div>
        </div>
        <hr>
        <div class="carpool-card-bottom">
            <div class="card-driver">
                <div class="container-profil">
                    <img src="/uploads/carpools/person-circle.svg" class="profil-icon" alt="profil user">
                    <p>Pseudo</p>
                </div>
                <div class="star">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#757575" viewBox="0 0 16 16">
                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                    </svg>
                    <p class="p-notes">4,5</p>
                </div>
                <div class="green-tag">
                    <p><?= $carpoolSearch['label_travel_type']; ?></p>
                </div>
            </div>
            <div class="details-link">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#528DB9" class="chevron-double-right" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M3.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L9.293 8 3.646 2.354a.5.5 0 0 1 0-.708" />
                    <path fill-rule="evenodd" d="M7.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L13.293 8 7.646 2.354a.5.5 0 0 1 0-.708" />
                </svg>
                <a href="/pages/carpools/carpool_details.php?id_carpool=<?= $key ?>;">
                    <p>Voir détails</p>
                </a>
            </div>
        </div>
    </div>