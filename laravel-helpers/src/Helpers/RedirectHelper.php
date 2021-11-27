<?php

namespace LaravelHelper\Helpers;

use Illuminate\Http\RedirectResponse;

/**
 * Class RedirectHelper
 * @package App\Helpers
 */
class RedirectHelper
{
    /**
     * @return RedirectResponse
     */
    public static function back()
    {
        return redirect()->back();
    }

    /**
     * @param $type
     * @param $message
     * @param null $route
     * @return RedirectResponse
     */
    public static function backWithMessage($type, $message, $route = null)
    {
        if (CheckHelper::isNotEmpty($route)) {
            return redirect($route)->with($type, $message);
        }
        return self::back()->with($type, $message);
    }
}
