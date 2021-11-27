<?php

namespace App\Traits;

use App\Helpers\AuthHelper;

/**
 * Class AuthTrait
 * @package App\Traits
 */
trait AuthTrait
{
    /**
     * @return string
     */
    final public function redirectTo()
    {
        if (AuthHelper::hasRole('Admin')) {
            return route('admin');
        }
        if (AuthHelper::hasRole('Writer')) {
            return route('writer');
        }
        return route('homepage');
    }
}
