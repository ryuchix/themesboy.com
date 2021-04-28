<?php $pagination = $resources->pagination() ?>
<?php if ($pagination->hasNextPage()) : ?>
<nav aria-label="Page navigation">
    <ul class="pagination justify-content-center">
        <?php if ($pagination->hasPrevPage()): ?>
            <li class="page-item">
                <a class="page-link" href="<?= $pagination->prevPageURL() ?>">Previous</a>
            </li>
        <?php else: ?>
            <li class="page-item disabled">
                <span class="page-link">Previous</span>
            </li>
        <?php endif ?>
        <?php foreach ($pagination->range(10) as $r): ?>
            <li class="page-item <?= $pagination->page() === $r ? 'active' : '' ?>">
                <a class="page-link" <?= $pagination->page() === $r ? ' aria-current="page"' : '' ?> href="<?= $pagination->pageURL($r) ?>">
                    <?= $r ?>
                </a>
            </li>
        <?php endforeach ?>

        <?php if ($pagination->hasNextPage()): ?>
            <li class="page-item">
                <a class="page-link" href="<?= $pagination->nextPageURL() ?>">Next</a>
            </li>
        <?php else: ?>
            <li class="page-item disabled">
                <span class="page-link">Next</span>
            </li>
        <?php endif ?>

    </ul>
</nav>
<?php endif ?>