<div class="alert alert-<?= $type ?? 'info' ?> alert-dismissible fade show" role="alert">
    <?= htmlspecialchars($message ?? '') ?>
    <button type="button" class="btn-close" onclick="this.parentElement.remove()">&times;</button>
</div>