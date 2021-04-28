<?php

return function ($site, $pages, $page) {

    $tags = page('resources')->children()->listed()->pluck('tags', ',', true);
    sort($tags);

    $resources = page('resources')->children()->listed()->sortBy('date', 'desc')->paginate(15);

    $toggleLogo = $site->toggle()->toBool();
    
    return [
        'resources'     => $resources,
        'tags'          => $tags,
        'toggleLogo'    => $toggleLogo
    ];
};