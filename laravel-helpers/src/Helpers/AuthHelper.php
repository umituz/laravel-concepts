<?php

namespace LaravelHelper\Helpers;

use Illuminate\Contracts\Auth\Authenticatable;

/**
 * Class AuthHelper
 * @package App\Helpers
 */
class AuthHelper
{
    /**
     * @return int|string|null
     */
    public static function id()
    {
        return auth()->id();
    }

    /**
     * @return Authenticatable|null
     */
    public static function user()
    {
        return auth()->user();
    }

}
