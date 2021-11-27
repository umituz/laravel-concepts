<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Artisan;

/**
 * Class CacheHelper
 * @package App\Helpers
 */
class CacheHelper
{
    /**
     * @return int
     */
    public static function clearAllCache()
    {
        return Artisan::call('perfectly-cache:clear');
    }
}
