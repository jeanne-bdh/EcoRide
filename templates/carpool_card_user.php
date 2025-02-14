<div class="carpool-card">
    <div class="carpool-card-top">
        <div class="tag-date">
            <p><?= $carpool['date_depart']; ?></p>
        </div>
        <div>
            <p class="p-credit"><?= $carpool['prix_pers']; ?> crédit(s)</p>
            <p class="p-place"><?= $carpool['place_restante']; ?> place(s)</p>
        </div>
    </div>
    <div class="travel">
        <div class="div-depart">
            <p><?= $carpool['heure_depart']; ?></p>
            <p><?= $carpool['lieu_depart']; ?></p>
        </div>
        <div class="travel-circle"></div>
        <hr class="travel-line">
        <p class="duree"><?= $carpool['duree']; ?></p>
        <hr class="travel-line">
        <div class="travel-circle"></div>
        <div class="div-arrivee">
            <p><?= $carpool['heure_arrivee']; ?></p>
            <p><?= $carpool['lieu_arrivee']; ?></p>
        </div>
    </div>
    <hr>
    <div class="carpool-card-bottom">
        <div class="tag-status" data-status="<?= $carpool['status_covoit']; ?>">
            <p><?= $carpool['status_covoit']; ?></p>
        </div>
        <div class="green-tag">
            <p><?= $carpool['type_voyage']; ?></p>
        </div>
        <div class="details-link">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#528DB9" class="chevron-double-right" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M3.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L9.293 8 3.646 2.354a.5.5 0 0 1 0-.708" />
                <path fill-rule="evenodd" d="M7.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L13.293 8 7.646 2.354a.5.5 0 0 1 0-.708" />
            </svg>
            <a href="#">
                <p>Voir détails</p>
            </a>
        </div>
    </div>
</div>