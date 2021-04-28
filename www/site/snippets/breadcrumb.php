<?php if ($page->template() == 'default') : ?>
<div class="col-12 col-md">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item" aria-current="page"><a href="<?= url('/') ?>">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $page->title() ?></li>
        </ol>
    </nav>
    <h1 class="mb-2"><?= $page->title() ?></h1>
</div>
<?php elseif ($page->template() == 'resource') : ?>
<div class="col-12 col-md">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item" aria-current="page"><a href="<?= url('/') ?>">All resources</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $page->title() ?></li>
        </ol>
    </nav>
    <h1 class="mb-2"><?= $page->title() ?></h1>
    <div class="article_meta mb-2">
        <div class="tags mr-2">
            <i class="fas fa-folder-open mr-1"></i>
            <ul>
                <?php $count = count($page->category()->split()); ?>
                <?php foreach ($page->category()->split() as $i => $tag): ?>
                    <li>
                        <a href="<?= url('resources/category/' . page()->getSlug($tag)) ?>">
                            <?= html($tag) ?><?= ($i < $count - 1) ? ',&nbsp' : ''; ?>
                        </a>
                    </li>
                <?php endforeach ?>
            </ul>
        </div>
        
        <div class="tags mr-2">
            <i class="fas fa-tag mr-1"></i>
            <ul>
                <?php $count = count($page->tags()->split()); ?>
                <?php foreach ($page->tags()->split() as $i => $tag): ?>
                    <li>
                        <a href="<?= url('resources/tag/' . page()->getSlug($tag)) ?>">
                            <?= html($tag) ?><?= ($i < $count - 1) ? ',&nbsp' : ''; ?>
                        </a>
                    </li>
                <?php endforeach ?>
            </ul>
        </div>
        
        <div class="tags">
            <i class="far fa-calendar-plus mr-1"></i>
            <time datetime="<?= $page->date()->toDate('d.m.Y') ?>" pubdate="pubdate"><?= $page->date()->toDate('Y-m-d') ?></time>
        </div>
        
    </div>
</div>
<?php else : ?>
<div class="col-12 col-md">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <?php if ($page->template() == 'home') : ?>
            <li class="breadcrumb-item active" aria-current="page">All resources</li>
            <?php else : ?>
            <li class="breadcrumb-item active" aria-current="page"><a href="<?= url('/') ?>">All resources</a></li>
            <?php endif ?>
            <?php if ($page->template() == 'base') : ?>
                <li class="breadcrumb-item active" aria-current="page"><?= ucwords($page->base()) ?><?= page()->getNormalSlug($page->title()) ?></li>
            <?php elseif($page->template() != 'home' && $page->template() != 'base') : ?>
                <li class="breadcrumb-item active" aria-current="page"><?= ucwords($page->base()) ?>: <?= page()->getNormalSlug($page->title()) ?></li>
            <?php else : ?>    
            <?php endif ?>
        </ol>
    </nav>
    <?php if ($page->template() == 'search') : ?>
        <h1 class="mb-2">Search results for:  <?= $query ?>
        </h1>
    <?php else : ?>
        <h1 class="mb-2"> 
            <?php if ($page->template() != 'home') : ?>
            <?= ucwords(page()->getNormalSlug($page->title())) ?></small>
            <?php endif ?>
        </h1>
        <?php if ($page->template() == 'resources') : ?>
            <?php if ($page->base() == 'category') : ?>
                <?= page()->getCategoryDescription(page()->getNormalSlug($page->title())) ?>
            <?php endif ?>
        <?php endif ?>
        <?php if ($page->template() == 'base') : ?>
            <?= $page->text()->kt() ?>
        <?php endif ?>
    <?php endif ?>
</div>
<?php endif ?>