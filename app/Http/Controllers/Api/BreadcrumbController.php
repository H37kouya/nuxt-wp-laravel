<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\Breadcrumb;
use App\Http\Controllers\Controller;

class BreadcrumbController extends Controller
{
    private $_breadcrumb;

    public function __construct(Breadcrumb $breadcrumb)
    {
        $this->_breadcrumb = $breadcrumb;
    }

    public function index(Request $request, string $slug)
    {
        return $this->_breadcrumb->generate($slug, $request);
    }
}
