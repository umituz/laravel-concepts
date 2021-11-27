<?php

namespace App\Helpers;

use Carbon\Carbon;

class CarbonHelper
{
    public static function formatDate($date)
    {
        return !empty($date) ? Carbon::make($date)->format('Y-m-d H:i') : null;
    }
}
