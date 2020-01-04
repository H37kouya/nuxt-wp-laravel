<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\InquiryService;
use App\Http\Controllers\Controller;
use App\Http\Requests\InquiryRegistPost;

class InquiryController extends Controller
{
    private $_service;

    public function __construct(InquiryService $service)
    {
        $this->_service = $service;
    }

    public function index(InquiryRegistPost $request)
    {
        return $this->_service->index($request);
    }

    public function types()
    {
        return $this->_service->types_select();
    }
}
