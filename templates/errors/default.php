<?php require_once dirname(__DIR__, 2) . "/templates/partials/header.php"; ?>

<?php if (!empty($errors)): ?>
    <?php foreach ($errors as $errorMessage) : ?>
        <div class="alert-container">
            <?= $errorMessage; ?>
        </div>
    <?php endforeach; ?>
<?php endif; ?>

<?php require_once dirname(__DIR__, 2) . "/templates/partials/footer.php" ?>