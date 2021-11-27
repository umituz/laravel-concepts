<?php

namespace App\Helpers;

use Illuminate\Contracts\Auth\Authenticatable;

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

    /**
     * @return bool
     */
    public static function check()
    {
        return auth()->check();
    }

    /**
     * @param $column
     * @return mixed
     */
    public static function userDetail($column)
    {
        return self::user()->$column;
    }
}
