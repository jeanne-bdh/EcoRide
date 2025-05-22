<?php if (isset($_GET['view']) && $_GET['view'] === 'future') : ?>

    <div class="status-carpool">
        <button class="btn-link-red" type="button" onclick="cancelCarpool(<?= $carpool['id_carpool'] ?>)">Annuler le voyage</button>

        <?php if ($carpool['label_status_carpool'] === 'Démarré') : ?>
            <button class="btn-blue btn-green" id="btn-end-carpool-<?= $carpool['id_carpool'] ?>" type="button" onclick="endCarpool(<?= $carpool['id_carpool'] ?>)">Arrivés à destination</button>
            <?php elseif ($carpool['label_status_carpool'] === 'Terminé') : ?>
                <button class="btn-blue btn-green" type="button" disabled>Terminé</button>
        <?php else : ?>
            <button class="btn-blue btn-green" id="btn-start-carpool-<?= $carpool['id_carpool'] ?>" type="button" onclick="startCarpool(<?= $carpool['id_carpool'] ?>)">Démarrer</button>
        <?php endif; ?>
    </div>

<?php endif; ?>