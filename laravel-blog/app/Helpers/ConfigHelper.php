<?php

namespace App\Helpers;

use Illuminate\Config\Repository;
use Illuminate\Contracts\Foundation\Application;

/**
 * Class ConfigHelper
 * @package App\Helpers
 */
class ConfigHelper
{
    /**
     * @return Repository|Application|mixed
     */
    public static function getAppName()
    {
        return config('app.name');
    }

    /**
     * @return string
     */
    public static function getLocale()
    {
        return app()->getLocale();
    }
}
