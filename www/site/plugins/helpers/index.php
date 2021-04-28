<?php

Kirby::plugin('getkirby/helpers', [
    'pageMethods' => [
        'getRelatedArticles' => function($tags_) {
            $tags = $tags_->tags()->split(',');
            $children = page('resources')->children()->listed();
            $relatedPages = $children->filter(function($child) use($tags) {
                if (array_intersect($child->tags()->split(','), $tags)) {
                    return $child;
                }
            });
            return $relatedPages;
        },
        'getRelatedTags' => function($tag) {
            return page('knowledge-base')->children()->filterBy('tags', $tag, ',');
        },
        'getRelatedCategory' => function($category) {
            return page('knowledge-base')->children()->filterBy('category', $category, ',');
        },
        'getTagUrl' => function($tag) {
            return url('/tags/' . $tag);
        },
        'getSlug' => function($string) {
            return preg_replace('/[^A-Za-z0-9-]+/', '-', strtolower($string));
        },
        'getNormalSlug' => function($string) {
            $str = str_replace("-", " ", $string);
            return ucfirst($str);
        },
        'getCategoryDescription' => function($name) {
            $categories = site()->categories()->toStructure();
            $structure = $categories->findBy('name', $name);
            return $structure->description()->kt();
        },
        'getActiveNav' => function($base, $val) {
            if ($base == 'tag' || $base == 'category') {
                if (page()->slug() == $val) {
                    return true;
                } else {
                    return false;
                }
            }
        },
    ],
    'routes' => [
        [
            'pattern' => 'resources/category/(:any)',
            'action'  => function ($category) {
                return new Page([
                    'slug'          => $category,
                    'template'      => 'resources',
                    'content'       => [
                        'title'     => ucwords($category),
                        'base'      => 'category',
                        'content'   => page('resources')->children()->listed()->filterBy('category', urldecode($category), ',')
                    ]
                ]);
            }
        ],
        [
            'pattern' => 'resources/tag/(:any)',
            'action'  => function ($tag) {
                return new Page([
                    'slug'          => $tag,
                    'template'      => 'resources',
                    'content'       => [
                        'title'     => ucwords($tag),
                        'base'       => 'tag',
                        'content'   => page('resources')->children()->listed()->filterBy('tags', urldecode($tag), ',')
                    ]
                ]);
            }
        ],
        [
            'pattern' => 'resources',
            'action'  => function () {
                go('/');
            }
        ],
    ]
]);
