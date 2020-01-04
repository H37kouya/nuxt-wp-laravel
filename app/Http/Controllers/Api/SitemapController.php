<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\SitemapService;
use App\Http\Controllers\Controller;

class SitemapController extends Controller
{
    private $_sitemapService;

    public function __construct(SitemapService $sitemapService)
    {
        $this->_sitemapService = $sitemapService;
    }

    public function index()
    {
        return $this->_sitemapService->generate();
    }
}
