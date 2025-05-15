<?php if (isset($_GET['view']) && $_GET['view'] === 'future') : ?>

    <div class="status-carpool">
        <button class="btn-link-red" type="button" onclick="cancelCarpool(<?= $carpool['id_carpool'] ?>)">Annuler le voyage</button>
        <button class="btn-blue" type="button">Démarrer</button>
    </div>

<?php endif; ?>