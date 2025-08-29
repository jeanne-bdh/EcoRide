<?php require_once dirname(__DIR__, 2) . "/templates/partials/header.php"; ?>

<?php foreach ($errors as $error) { ?>
    <div class="alert-container">
        <?= $error; ?>
    </div>
<?php } ?>

<?php require_once dirname(__DIR__, 2) . "/templates/partials/footer.php" ?>