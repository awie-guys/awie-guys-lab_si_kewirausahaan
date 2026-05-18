<div id="<?= $id ?>" class="modal-overlay">
    <div class="modal-content">
        <div class="modal-header">
            <h3><?= $title ?></h3>
            <span class="close-modal" onclick="closeModal('<?= $id ?>')">&times;</span>
        </div>
        <div class="modal-body">
            <?= $content ?>
        </div>
    </div>
</div>