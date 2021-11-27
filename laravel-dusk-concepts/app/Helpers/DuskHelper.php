<?php

namespace App\Helpers;

use App\Providers\DuskServiceProvider;

/**
 * Class DuskHelper
 * @package App\Helpers
 */
class DuskHelper
{
    public static function check()
    {
        return DuskServiceProvider::class;
    }
}
