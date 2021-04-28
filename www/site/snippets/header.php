<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <?php snippet('meta_information'); ?>
    <?php snippet('robots'); ?>
  <?= $site->analytics() ?>
  <?= liveCSS('assets/builds/bundle.css?t='.time()) ?>
  <script src="https://kit.fontawesome.com/661e9eb212.js" crossorigin="anonymous"></script>
</head>
<body>
  <div class="siteHeader d-flex align-items-center justify-content-between flex-wrap">
      <div class="siteHeader_branding d-flex align-items-center">
          <a class="mr-2" href="/">
          <?php if ($toggleLogo) : ?>
            <?php if ($image = $site->logo()->toFile()) : ?>
              <img class="logo" src="<?= $image->url() ?>" alt="<?= $image->alt() ?>">
            <?php endif ?>
          <?php else : ?>
            <div class="logo-text font-weight-bold text-white"><?= $site->logo_text() ?></div>
          <?php endif ?>
        </a>
      </div>
      <div class="buerger-menu ">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar">
            <span class="sr-only">Toggle navigation</span>
            <i class="fas fa-bars"></i>
        </button>
      </div>
      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li class="list-inline-item"><a href="https://twitter.com/Xdresources" target="_blank"><i class="fab fa-twitter"></i></a></li>
          <li class="list-inline-item"><a href="https://www.facebook.com/Xdresources/" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
          <li class="list-inline-item"><a href="https://xdresources.co/feed" target="_blank"><i class="fas fa-rss"></i></a></li>
          <li class="list-inline-item"><a href="/submit">Submit resource</a></li>
        </ul>
      </div>
      <div class="main-geader siteHeader_contact <?= $toggleLogo ? '': 'mt-0' ?>">
          <ul class="list-inline d-flex align-items-center mb-0">
          <li class="list-inline-item"><a href="https://twitter.com/Xdresources" target="_blank"><i class="fab fa-twitter"></i></a></li>
          <li class="list-inline-item"><a href="https://www.facebook.com/Xdresources/" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
          <li class="list-inline-item"><a href="https://xdresources.co/feed" target="_blank"><i class="fas fa-rss"></i></a></li>
          <li class="list-inline-item"><a href="/submit">Submit resource</a></li>
          </ul>
      </div>
  </div>
  <nav id="sidebar" class="nav-sidebar collapse navbar-collapse mt-2">
  <div class="sidebarLeft mb-2">
    <div class="">
      <ul class="nav navbar-nav">
        <li class="list-inline-item"><a href="https://twitter.com/Xdresources" target="_blank"><i class="fab fa-twitter"></i></a></li>
        <li class="list-inline-item"><a href="https://www.facebook.com/Xdresources/" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
        <li class="list-inline-item"><a href="https://xdresources.co/feed" target="_blank"><i class="fas fa-rss"></i></a></li>
        <li class="list-inline-item"><a href="/submit">Submit resource</a></li>
      </ul>
    </div>
  </div>
    <?php snippet('sidebar', ['tags' => $tags ]) ?>
  </nav>
