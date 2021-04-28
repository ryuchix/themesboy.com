<div class="container-fluid">
    <div class="row">
        <div class="main col-12 col-lg-9 col-xl-8 pt-3 pb-5">
            <div class="row align-items-center pb-2">
                <div class="col-12 mb-3">
                    <div class="small font-weight-bold text-uppercase text-muted mt-3 mb-1">Sponsors</div>
                    <?= $site->ad_code() ?>
                </div>
                <?php snippet('breadcrumb') ?>
            </div>
            <div class="row">
                <?php if ($page->slug() == 'all-categories') : ?>     
                <ul class="mt-1">
                    <?php foreach ($site->categories()->toStructure() as $category) : ?>
                    <li><a href="<?= url('resources/category/' . page()->getSlug($category->name())) ?>"><?= $category->name() ?></a></li>
                    <?php endforeach ?>
                </ul>
                <?php endif ?>
                <?php if ($page->slug() == 'all-tags') : ?>        
                <ul class="mt-1">
                    <?php foreach ($tags as $i => $tag) : ?>
                    <li><a href="<?= url('resources/tag/' . page()->getSlug($tag)) ?>"><?= $tag ?></a></li>
                    <?php endforeach ?>
                </ul>
                <?php endif ?>
            </div>
        </div>
        <div class="col-12 col-lg-3 col-xl-2 px-0 pt-3 pb-4 order-lg-first bg-light">
            <?php snippet('sidebar', ['tags' => $tags ]) ?>
        </div>
    </div>
</div>