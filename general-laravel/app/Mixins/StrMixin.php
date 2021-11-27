<?php

namespace App\Mixins;

class StrMixin
{
    public function partNumber()
    {
        return function ($part) {
            return 'CLASS-' . substr($part, 0, 3) . '-' . substr($part, 3);
        };
    }

    public function prefix()
    {
        return function ($string, $prefix = 'UZ-') {
            return $prefix . $string;
        };
    }
}
