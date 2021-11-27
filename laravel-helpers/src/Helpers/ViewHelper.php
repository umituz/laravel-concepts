<?php

namespace LaravelHelper\Helpers;

/**
 * Class ViewHelper
 * @package LaravelHelper\Helpers
 */
class ViewHelper
{
    /**
     * Checks view exists or not
     *
     * @param $view
     * @return bool
     */
    public static function viewExists($view)
    {
        return view()->exists($view);
    }
}