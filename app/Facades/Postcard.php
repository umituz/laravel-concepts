<?php

namespace App\Facades;

class Postcard
{
    protected static function resolveFacade($name)
    {
        return app()->make($name);
    }

    public static function __callStatic($method, $arguments)
    {
        return (self::resolveFacade('Postcard'))->$method(...$arguments);
    }
}
