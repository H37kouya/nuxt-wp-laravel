<?php

namespace App\Rules;

use GuzzleHttp\Client;
use Illuminate\Contracts\Validation\Rule;

class Recaptcha implements Rule
{

    /**
     * Recaptcha の人間のスコア
     *
     * @var float
     */
    private $_base_score;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct(float $base_score = 0.5)
    {
        $this->_base_score = $base_score;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $client = new Client();
        $response = $client->request('POST', 'https://www.google.com/recaptcha/api/siteverify', [
            'form_params' => [
                'secret' => config('service.recaptcha_secret_key'),
                'response' => $value
            ]
        ]);
        $results = json_decode($response->getBody(), true);
        return $results['success'] && $results['score'] > $this->_base_score;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return '機械的なアクセスだと判定されました。リロードしてもう一度実行してください。';
    }
}
