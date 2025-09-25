<div class="pagination" style="text-align:center; margin-top: 30px;">
    <?php if ($page > 1): ?>
        <a href="?page=<?= $page - 1 ?>" style="margin-right: 10px;">&#8592; Prev</a>
    <?php endif; ?>

    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
        <?php if ($i == $page): ?>
            <strong style="margin: 0 5px;"><?= $i ?></strong>
        <?php else: ?>
            <a href="?page=<?= $i ?>" style="margin: 0 5px;"><?= $i ?></a>
        <?php endif; ?>
    <?php endfor; ?>

    <?php if ($page < $totalPages): ?>
        <a href="?page=<?= $page + 1 ?>" style="margin-left: 10px;">Next &#8594;</a>
    <?php endif; ?>
</div>
