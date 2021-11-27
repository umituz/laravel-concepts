<?php

namespace LaravelHelper\Helpers;

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
     * @return Repository|Application|mixed
     */
    public static function getAppUrl()
    {
        return config('app.url');
    }

    /**
     * @return string
     */
    public static function getLocale()
    {
        return app()->getLocale();
    }

    /**
     * Returns the database name
     *
     * @return Repository|mixed
     */
    public static function getDatabaseName()
    {
        return config('database.connections.mysql.database');
    }
}
