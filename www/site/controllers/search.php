<?php

return function ($site) {

  $query   = get('q');
  $resources = page('resources')->children()->listed()->sortBy('date', 'desc')->search($query, 'title|text')->paginate(15);
  $tags = page('resources')->children()
    ->listed()->pluck('tags', ',', true);
    sort($tags);

    $toggleLogo = $site->toggle()->toBool();

  return [
    'query'       => $query,
    'tags'        => $tags,
    'resources'   => $resources,
    'toggleLogo'   => $toggleLogo
  ];

};