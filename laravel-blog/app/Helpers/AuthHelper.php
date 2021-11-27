<?php

namespace App\Helpers;

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

    /**
     * @param $role
     * @return mixed
     */
    public static function hasRole($role)
    {
        return self::user()->hasAnyRole($role);
    }

    /**
     * @param $postId
     * @return mixed
     */
    public static function getVote($postId)
    {
        $user = self::user();
        if (CheckHelper::isNotEmpty($user)) {
            return $user->votes()->where('post_id', $postId)->first();
        }
    }
}
