<?php

namespace App\Helpers;

/**
 * Class CheckHelper
 * @package App\Helpers
 */
class CheckHelper
{
    /**
     * Checks whether the value sent by the parameter is null or not
     *
     * @param $data
     * @return bool
     */
    public static function isNotEmpty($data)
    {
        if (is_array($data)) {
            return self::isNotEmptyArray($data);
        } else if (!empty($data) && $data != "" && $data != null && trim($data)) {
            return $data;
        }
        return false;
    }

    /**
     * Checks whether the value sent by the parameter is null array or not
     *
     * @param $array
     * @return bool
     */
    public static function isNotEmptyArray($array)
    {
        if (is_countable($array) && count($array) > 0 && $array != []) {
            return $array;
        }
        return false;
    }
}
