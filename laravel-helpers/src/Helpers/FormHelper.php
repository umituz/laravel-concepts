<?php

namespace LaravelHelper\Helpers;

/**
 * Class FormHelper
 * @package LaravelHelper\Helpers
 */
class FormHelper
{
    /**
     * Returns 'selected' if the values sent as parameters are equal
     *
     * @param $data
     * @param $equal
     * @return string|null
     */
    public static function selected($data, $equal)
    {
        return $data == $equal ? "selected" : null;
    }
    
    /**
     * Returns 'checked' if the values sent as parameters are equal
     *
     * @param $data
     * @param $equal
     * @return string|null
     */
    public static function checked($data, $equal)
    {
        return $data == $equal ? "checked" : null;
    }
}
