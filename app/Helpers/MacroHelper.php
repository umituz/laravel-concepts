<?php

namespace App\Helpers;

use Illuminate\Support\Traits\Macroable;

/**
 * Class MacroHelper
 * @package App\Helpers
 */
class MacroHelper
{
    use Macroable;

    /**
     * Returns test string
     *
     * @return string
     */
    public static function test()
    {
        return 'test';
    }
}
