<?php

namespace App\Mixins;

/**
 * Class StatusMixin
 * @package App\Mixins
 */
class StatusMixin
{
    /**
     * @return \Closure
     */
    public static function error()
    {
        return function () {
            return 500;
        };
    }

    /**
     * @return \Closure
     */
    public static function success()
    {
        return function () {
            return 200;
        };
    }
}
