<?php
    $tags = page('resources')->children()
    ->listed()->pluck('tags', ',', true);
    sort($tags);
?>
<div class="sidebarLeft main-sidebar">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-12 p-0 px-md-3 px-lg-0">
                <div class="small font-weight-bold text-uppercase text-muted">Search</div>
                <form class="mt-1" method="get" action="<?= url('search') ?>">
                    <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search..." name="q">
                    <div class="input-group-prepend btn-search">
                        <button type="submit" class="input-group-text">
                            <i class="fas fa-search icon-search"></i>
                        </button>
                    </div>
                    </div>
                </form>
                <div class="col-12 col-md-6 col-lg-12 p-0 px-md-3 px-lg-0">
                    <div class="small font-weight-bold text-uppercase text-muted mt-3">Browse by category</div>
                    <ul class="sidebarLeft_categories mt-1">
                        <?php foreach ($site->categories()->toStructure()->limit(20) as $category) : ?>
                        <li class="<?= page()->getActiveNav('category', page()->getSlug($category->name())) ? 'active' : '' ?>"><a href="<?= url('resources/category/' . page()->getSlug($category->name())) ?>"><?= $category->name() ?></a></li>
                        <?php endforeach ?>
                    </ul>
                    <?php if (count($site->categories()->toStructure()) > 20) : ?>
                        <div class="viewall"><a href="<?= url('category') ?>">View all categories</a></div>
                    <?php endif ?>
                </div>
                <div class="col-12 col-md-6 col-lg-12 p-0 px-md-3 px-lg-0">
                    <div class="small font-weight-bold text-uppercase text-muted mt-3">Browse by tag</div>
                    <ul class="sidebarLeft_categories mt-1">
                        <?php foreach ($tags as $i => $tag) : ?>
                            <?php if ($i <= 21) : ?>
                            <li class="<?= page()->getActiveNav('tag', page()->getSlug($tag)) ? 'active' : '' ?>"><a href="<?= url('resources/tag/' . page()->getSlug($tag)) ?>"><?= $tag ?></a></li>
                            <?php endif ?>
                        <?php endforeach ?>
                    </ul>
                    <?php if (count($tags) > 20) : ?>
                        <div class="viewall"><a href="<?= url('category') ?>">View all categories</a></div>
                    <?php endif ?>
                </div>
            </div>
        </div>
    </div>
</div>