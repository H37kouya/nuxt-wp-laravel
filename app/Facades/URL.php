<?php

namespace App\Facades;

use Illuminate\Support\Facades\URL as URLFacades;

class URL extends URLFacades
{
    /**
     * WordPress の URL を返す関数
     *
     * @return string
     */
    public static function wp_url(): string
    {
        return config('app.wp_url');
    }

    /**
     * WordPress の api の URL
     *
     * @return string
     */
    public static function wp_api_url(): string
    {
        return config('app.wp_url') . '/wp-json';
    }
}
