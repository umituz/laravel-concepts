<?php

namespace App\Helpers;

/**
 * Class FormHelper
 * @package App\Helpers
 */
class FormHelper
{
    /**
     * @param $data
     * @param $equality
     * @return string|null
     */
    public static function selected($data, $equality)
    {
        return $data ===  $equality ? 'selected' : null;
    }
}
