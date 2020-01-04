<?php

namespace App\Services;

use Mail;
use App\Mail\Inquiry;
use App\Http\Requests\InquiryRegistPost;

class InquirySendMailService
{
    /**
     * @var string
     */
    private $myname;

    /**
     * @var string
     */
    private $place;

    /**
     * @var string
     */
    private $myaddress;

    /**
     * @var string
     */
    private $me_subject;

    /**
     * @var string
     */
    private $customer_subject;

    public function __construct()
    {
        $this->myname           = '『記録と乗り越え』管理人';
        $this->myaddress        = config('mail.address');
        $this->place            = '『記録と乗り越え』お問い合わせ';
        $this->me_subject       = '【記録と乗り越え】『お問い合わせ』お問い合わせありがとうございました。';
        $this->customer_subject = '『記録と乗り越え』サイトからのお問い合わせ';
    }

    /**
     * 自分に送信するメールの内容
     *
     * @param InquiryRegistPost $request
     * @return void
     */
    public function toMe(InquiryRegistPost $request)
    {
        // 送信メール
        Mail::send(new Inquiry([
            'to' => $request->email,
            'to_name' => $request->name,
            'from' => $this->myaddress,
            'from_name' => $this->myname,
            'subject' => $this->me_subject,
            'place' => $this->place,
            'type' => $request->type,
            'body' => $request->body
        ]));
    }

    /**
     * 顧客に送信する内容
     *
     * @param InquiryRegistPost $request
     * @return void
     */
    public function toCustomer(InquiryRegistPost $request)
    {
        Mail::send(new Inquiry([
            'to' => $this->myaddress,
            'to_name' => $this->myname,
            'from' => $request->email,
            'from_name' => $request->name,
            'subject' => $this->customer_subject,
            'place' => $this->place,
            'type' => $request->type,
            'body' => $request->body
        ], 'from'));
    }
}
