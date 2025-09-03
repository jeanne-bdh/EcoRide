<?php if (!empty($isFutureView)) : ?>

    <div class="status-carpool">
        <button class="btn-link-red" type="button" onclick="cancelCarpool(<?= $carpool->getIdCarpool(); ?>)">Annuler le voyage</button>

        <?php if ($carpool->getStatusCarpool()->getLabelStatusCarpool() === 'Démarré') : ?>
            <button class="btn-blue btn-green" id="btn-end-carpool-<?= $carpool->getIdCarpool(); ?>" type="button" onclick="endCarpool(<?= $carpool->getIdCarpool(); ?>)">Arrivés à destination</button>
        <?php elseif ($carpool->getStatusCarpool()->getLabelStatusCarpool() === 'Terminé') : ?>
            <button class="btn-blue btn-green" type="button" disabled>Terminé</button>
        <?php else : ?>
            <button class="btn-blue btn-green" id="btn-start-carpool-<?= $carpool->getIdCarpool(); ?>" type="button" <?php if ($carpool->getCarpoolsUsers()->getRoleInCarpool() === 'Passager') {
                                                                                                                            echo 'disabled';
                                                                                                                        } ?> onclick="startCarpool(<?= $carpool->getIdCarpool(); ?>)">Démarrer</button>
        <?php endif; ?>
    </div>

<?php endif; ?>