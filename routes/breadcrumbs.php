<?php

use App\Services\WPService;
use App\Services\BreadcrumbPostService;

// Home
Breadcrumbs::for('home', function ($trail) {
    $trail->push('Home', '/');
});

// Home > Blog
Breadcrumbs::for('article', function ($trail) {
    $trail->parent('home');
    $trail->push('記事一覧', '/articles');
});

// Home > Article > [Category]
Breadcrumbs::for('category', function ($trail, int $parent_id) {
    $trail->parent('article');
    $service = new WPService;
    $category = $service->category($parent_id);
    $trail->push($category['name'], '/' . $category['taxonomy'] . '/' . $category['slug']);
});

// Home > Article > [Tag]
Breadcrumbs::for('tag', function ($trail, int $parent_id) {
    $trail->parent('article');
    $service = new WPService;
    $tag = $service->tag($parent_id);

    dd($tag);
    $trail->push($tag['name'], '/' . $tag['taxonomy'] . '/' . $tag['slug']);
});


// Home > Article > [Tag] > [Post]
Breadcrumbs::for('post', function ($trail, BreadcrumbPostService $post) {
    if (empty($post->parent)) {
        $trail->parent('article');
    } else {
        $trail->parent($post->parent, $post->parent_id);
    }

    $trail->push($post->title, $post->link);
});
