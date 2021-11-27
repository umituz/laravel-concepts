<?php

namespace LaravelHelper\Helpers;

/**
 * Class ArrayHelper
 * @package LaravelHelper\Helpers
 */
class ArrayHelper
{
    /**
     * Explodes the given string then returns last index of array
     *
     * @param $string
     * @param string $delimiter
     * @return mixed|null
     */
    public static function getLastExplodedIndex($string, $delimiter = '.')
    {
        if (CheckHelper::isNotEmpty($string) && is_string($string)) {
            return last(explode($delimiter, $string));
        }
        return null;
    }
    
    /**
     * Processes the unlimited array with the callback function sent as a parameter.
     *
     * @param $callbackFunction
     * @param mixed ...$array
     * @return array
     */
    public static function callableArrayMap($callbackFunction, ...$array)
    {
        if (is_callable($callbackFunction)) {
            $array = array_map($callbackFunction, ...$array);
            return $callbackFunction($array);
        }
        return null;
    }
    
    /**
     * Returns the elements of array
     *
     * @param $array
     * @return array
     */
    public static function getArrayElements($array)
    {
        if (CheckHelper::isNotEmptyArray($array)) {
            $values = array_values($array);
            $keys = array_keys($array);
            return [
                'values' => $values,
                'keys' => $keys,
            ];
        }
        return [
            'values' => [],
            'keys' => []
        ];
    }
}
