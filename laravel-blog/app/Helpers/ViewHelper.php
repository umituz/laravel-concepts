<?php

namespace App\Helpers;

/**
 * Class ViewHelper
 * @package App\Helpers
 */
class ViewHelper
{
    /**
     * @param $data
     * @return int
     */
    public static function uniqueViewCount($data)
    {
        return views($data)->unique()->count();
    }
}
