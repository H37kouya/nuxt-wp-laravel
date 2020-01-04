<?php

namespace App\Services;

use Exception;
use App\Services\WPService;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Services\BreadcrumbPostService;
use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs as BreadcrumbsManager;

class Breadcrumb
{
    private $_wPService;

    public function __construct(WPService $wPService)
    {
        $this->_wPService = $wPService;
    }

    public function generate(string $slug, Request $request): Collection
    {
        try {
            if ($request->query('type') === 'articles') {
                $response = $this->_wPService->slug($slug);

                $parent    = null;
                $parent_id = null;

                if (count($response['categories']) > 0) {
                    $parent    = 'category';
                    $parent_id = $response['categories'][0];
                }

                if (empty($parent) && count($response['tags']) > 0) {
                    $parent    = 'tag';
                    $parent_id = $response['tags'][0];
                }

                return BreadcrumbsManager::generate(
                    'post',
                    new BreadcrumbPostService(
                        $response['title']['rendered'],
                        '/articles' . '/' . $response['slug'],
                        $parent,
                        $parent_id
                    )
                );
            } elseif ($request->query('type') === 'category') {
                $response = $this->_wPService->category_slug($slug);

                return BreadcrumbsManager::generate(
                    'category',
                    $response[0]['id']
                );
            } elseif ($request->query('type') === 'tag') {
                $response = $this->_wPService->category_slug($slug);

                return BreadcrumbsManager::generate(
                    'category',
                    $response[0]['id']
                );
            } elseif ($request->query('type') === 'articles.index') {
                return BreadcrumbsManager::generate('article');
            }

            return BreadcrumbsManager::generate('home');
        } catch (Exception $e) {
            return BreadcrumbsManager::generate('home');
        }
    }
}
