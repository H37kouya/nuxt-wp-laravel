<?php

namespace App\Http\Requests;

use App\Rules\Recaptcha;
use Illuminate\Foundation\Http\FormRequest;

class InquiryRegistPost extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'type' => 'required',
            'type.*' => 'in:記録と乗り越えについて,仕事の依頼,その他',
            'name' => 'required|max:50',
            'email' => 'required|email|max:255',
            'body' => 'required|max:1000',
            'url' => 'required|url|max:100',
            'token' => new Recaptcha(),
        ];
    }
}
