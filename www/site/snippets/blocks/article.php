<article class="article col-12 col-md-4 mb-3">
    <div class="thumb">
        <a class="thumb_img" href="<?= $resource->url() ?>">
            <?php if ($image = $resource->cover()->toFile()) : ?>
            <img class="d-block img-fluid" src="<?= $image->url() ?>" alt="<?= $image->alt() ?>">
            <?php endif ?>
            <div class="thumb_desc"><?= $resource->excerpt()->kt() ?></div>
        </a>
        <div class="thumb_info">
        <header>
            <h1 class="thumb_title"><a href="<?= $resource->url() ?>"><?= $resource->title() ?></a></h1>
            <div class="article_meta">
                <div class="article_meta-item category mr-2">
                    <i class="fas fa-tag pr-1"></i>
                    <div>
                        <?php $count = count($resource->tags()->split()); ?>
                        <?php foreach ($resource->tags()->split() as $i => $tag): ?>
                            <a href="<?= url('resources/tag/' . page()->getSlug($tag)) ?>">
                                <?= html($tag) ?><?= ($i < $count - 1) ? ',' : ''; ?>
                            </a>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        </header>
        </div>
    </div>
</article>