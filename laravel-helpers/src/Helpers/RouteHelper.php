<?php

namespace LaravelHelper\Helpers;

use Illuminate\Support\Facades\Route;

/**
 * Class RouteHelper
 * @package LaravelHelper\Helpers
 */
class RouteHelper
{
    /**
     * @param null $prefix
     * @param $middleware
     * @param $namespace
     * @param $group
     */
    public static function setRouteServiceProvider($prefix, $middleware, $namespace, $group)
    {
        Route::prefix($prefix)
            ->middleware($middleware)
            ->namespace($namespace)
            ->group($group);
    }
}
