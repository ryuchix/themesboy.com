<?php if ($block->url()->isNotEmpty()): ?>
<figure class="embed-responsive embed-responsive-16by9">
  <?= video($block->url()) ?>
  <?php if ($block->caption()->isNotEmpty()): ?>
  <figcaption><?= $block->caption() ?></figcaption>
  <?php endif ?>
</figure>
<?php endif ?>
