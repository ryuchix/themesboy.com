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
            <div class="row d-flex flex-column col-12 col-md">
                <?php foreach ($page->content()->text()->toBlocks() as $block) : ?>
                    <?php snippet('blocks/' . $block->type(), ['block' => $block]) ?>
                <?php endforeach ?>
            </div>
            <?php if ($page->download()->toStructure()->isNotEmpty()) : ?>
            <?php foreach ($page->download()->toStructure() as $button) : ?>
                <a class="btn btn-primary download-external btn-lg px-2 mt-2" rel="nofollow" href="<?= $button->button_url() ?>" target="_blank"><?= $button->button_name() ?></a>
            <?php endforeach ?>
            <?php endif ?>
            <div class="row pt-3">
                <div class="col-12"><hr></div>
                <div class="col-12 py-2">
                    <div class="small font-weight-bold text-uppercase text-muted">Related Resources</div>
                </div>
            </div>
            <div class="row">
                <?php foreach (page()->getRelatedArticles($page->tags())->not($page)->shuffle()->limit(6) as $resource) : ?>
                    <?php snippet('blocks/article', ['resource' => $resource]) ?>
                <?php endforeach ?>
            </div>
        </div>
        <div class="col-12 col-lg-3 col-xl-2 px-0 pt-3 pb-4 order-lg-first bg-light">
            <?php snippet('sidebar', ['tags' => $tags ]) ?>
        </div>
    </div>
</div>