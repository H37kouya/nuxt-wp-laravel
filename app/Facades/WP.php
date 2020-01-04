<?php

namespace App\Facades;

use App\Facades\URL;

class WP
{
    /**
     * WordPress URL
     *
     * @return string
     */
    public static function url(): string
    {
        return URL::wp_url();
    }

    /**
     * WordPress Api URL
     *
     * @return string
     */
    public static function api_url(): string
    {
        return URL::wp_api_url();
    }
}
