<?php

return function ($site, $pages, $page) {

    $tags = page('resources')->children()->listed()->pluck('tags', ',', true);
    sort($tags);

    if ($page->base() == 'category') {
        $resources = page('resources')->children()->listed()->sortBy('date', 'desc')->filterBy('category', page()->getNormalSlug($page->slug()), ',')->paginate(15);
    } elseif ($page->base() == 'tag') {
        $resources = page('resources')->children()->listed()->sortBy('date', 'desc')->filterBy('tags', page()->getNormalSlug($page->slug()), ',')->paginate(15);
    } else {
        $resources = [];
    }

    $toggleLogo = $site->toggle()->toBool();

    return [
        'resources'     => $resources,
        'tags'          => $tags,
        'toggleLogo'   => $toggleLogo
    ];
};