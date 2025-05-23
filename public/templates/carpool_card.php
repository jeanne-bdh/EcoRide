<?php

require_once __DIR__ . "/../libs/format_time.php";
require_once __DIR__ . "/../libs/duration.php";
require_once __DIR__ . "/../libs/review.php";

?>

<div class="carpool-card">
    <div class="carpool-card-top">
        <div class="tag" id="blue-tag">
            <p><?= $carpool['date_depart']; ?></p>
        </div>
        <div>
            <p class="p-credit"><?= $carpool['price']; ?> crédit(s)</p>
            <p class="p-place"><?= $carpool['remaining_seat']; ?> place(s)</p>
        </div>
    </div>
    <div class="travel">
        <div class="container-depart">
            <p class="time-style"><?= formatTime($carpool['time_depart']); ?></p>
            <p><?= $carpool['localisation_depart']; ?></p>
        </div>
        <div class="travel-circle"></div>
        <hr class="travel-line">
        <p class="duration"><?= getDuration($carpool['time_depart'], $carpool['time_arrival']); ?></p>
        <hr class="travel-line">
        <div class="travel-circle"></div>
        <div class="container-arrival">
            <p class="time-style"><?= formatTime($carpool['time_arrival']); ?></p>
            <p><?= $carpool['localisation_arrival']; ?></p>
        </div>
    </div>
    <hr>
    <div class="carpool-card-bottom">
        <div class="card-driver">
            <div class="container-pseudo">
                <img src="/uploads/person-circle.svg" class="profil-icon" alt="profil user">
                <p><?= $carpool['driver_pseudo']; ?></p>
            </div>
            <div class="star">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#757575" viewBox="0 0 16 16">
                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                </svg>
                <p class="p-notes"><?= $averageNotes['average_notes']; ?></p>
            </div>
            <div class="tag" id="green-tag">
                <p><?= $carpool['label_travel_type']; ?></p>
            </div>
        </div>
        <div class="card-inner-bottom">
            <div class="tag tag-status" id="<?= $carpool['id_carpool']; ?>" data-status="<?= $carpool['label_status_carpool']; ?>">
                <p><?= $carpool['label_status_carpool']; ?></p>
            </div>
            <div class="details-link">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#528DB9" class="chevron-double-right" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M3.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L9.293 8 3.646 2.354a.5.5 0 0 1 0-.708" />
                    <path fill-rule="evenodd" d="M7.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L13.293 8 7.646 2.354a.5.5 0 0 1 0-.708" />
                </svg>
                <a href="/pages/carpools/carpool_details.php?id_carpool=<?=$carpool['id_carpool']; ?>">
                    Voir détails
                </a>
            </div>
        </div>
    </div>

    <?php require __DIR__ . "/../pages/users/future-carpool/future_carpool_card.php"; ?>
</div>

<?php require_once __DIR__ . "/../pages/users/future-carpool/confirm_modal.php"; ?>