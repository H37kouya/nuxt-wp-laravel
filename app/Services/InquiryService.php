<?php

namespace App\Services;

use App\Models\Inquiry;
use App\Http\Requests\InquiryRegistPost;
use App\Services\InquirySendMailService;

class InquiryService
{
    private $_inquirySendMailService;

    public function __construct(InquirySendMailService $inquirySendMailService)
    {
        $this->_inquirySendMailService = $inquirySendMailService;
    }

    public function index(InquiryRegistPost $request)
    {
        $input = $request->except('action');
        Inquiry::create($input);

        // 送信メール
        $this->_inquirySendMailService->toMe($request);
        // 受信メール
        $this->_inquirySendMailService->toCustomer($request);
    }

    public function types_select()
    {
        return Inquiry::$types;
    }
}
