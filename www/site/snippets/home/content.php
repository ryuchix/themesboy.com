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
                <?php if (count($resources) > 0) : ?>
                <?php foreach ($resources as $resource) : ?>
                    <?php snippet('blocks/article', ['resource' => $resource]) ?>
                <?php endforeach ?>
                <?php else : ?>
                    <div class="col-12">
                        <p class="lead">No resources yet.</p>
                    </div>
                <?php endif ?>
            </div>
            <div class="row">
                <div class="col-12">
                    <?php snippet('pagination', ['resources' => $resources ]) ?>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-3 col-xl-2 px-0 pt-3 pb-4 order-lg-first bg-light">
            <?php snippet('sidebar', ['tags' => $tags ]) ?>
        </div>
    </div>
</div>