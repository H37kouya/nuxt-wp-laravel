<?php

namespace App\Services;

use App\Services\WPService;

class SitemapService
{
    public function generate()
    {
        $sitemap = $this->compute_post_array();
        $sitemap = array_merge($sitemap, $this->compute_category_array());
        $sitemap = array_merge($sitemap, $this->compute_tag_array());

        return json_encode($sitemap);
    }

    private function compute_post_array(bool $isXml = true): array
    {
        $_ret_arr = [];
        $_wPService = new WPService;
        $_posts = $_wPService->post();

        foreach ($_posts as $_post) {
            $_url = '/articles' . '/' . $_post['slug'];
            $_ret_arr[] = $isXml ? [ 'url' => $_url ] : [ 'url' => $_url, 'title' => $_post['title']['rendered'] ];
        }

        return $_ret_arr;
    }

    private function compute_category_array(bool $isXml = true): array
    {
        $_ret_arr = [];
        $_wPService = new WPService;
        $_categories = $_wPService->category(null);

        foreach ($_categories as $_category) {
            $_url = '/category' . '/' . $_category['slug'];
            $_ret_arr[] = $isXml ? [ 'url' => $_url ] : [ 'url' => $_url, 'title' => $_category['title']['rendered'] ];
        }

        return $_ret_arr;
    }

    private function compute_tag_array(bool $isXml = true): array
    {
        $_ret_arr = [];
        $_wPService = new WPService;
        $_tags = $_wPService->tag(null);

        foreach ($_tags as $_tag) {
            $_url = '/tag' . '/' . $_tag['slug'];
            $_ret_arr[] = $isXml ? [ 'url' => $_url ] : [ 'url' => $_url, 'title' => $_tag['title']['rendered'] ];
        }

        return $_ret_arr;
    }
}
