<?php if (!empty($errors)): ?>
    <?php foreach ($errors as $errorMessage) : ?>
        <div class="alert-container">
            <?= htmlspecialchars($errorMessage); ?>
        </div>
    <?php endforeach; ?>
<?php endif; ?>