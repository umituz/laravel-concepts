<?php

namespace LaravelHelper\Helpers;

use Carbon\Carbon;

/**
 * Class DateHelper
 * @package App\Helpers
 */
class DateHelper
{
    /**
     * @param $date
     * @return mixed|null
     */
    public static function isoFormat($date)
    {
        return CheckHelper::isNotEmpty($date) ? $date->isoFormat('Do MMMM YYYY H:m:ss') : null;
    }

    /**
     * @param $datetime
     * @return Carbon|false
     */
    public static function timestamp($datetime)
    {
        return CheckHelper::isNotEmpty($datetime) ? Carbon::createFromFormat('Y-m-d H:i', $datetime) : null;
    }

    /**
     * @param $date
     * @return mixed|null
     */
    public static function readableDateForHumans($date)
    {
        return CheckHelper::isNotEmpty($date) ? $date->diffForHumans() : null;
    }
}
