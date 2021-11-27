<?php

namespace LaravelHelper\Helpers;

/**
 * Class ClassHelper
 * @package LaravelHelper\Helpers
 */
class ClassHelper
{
	/**
	 * Checks the property of the class exists or not
	 *
	 * @param $class
	 * @param $property
	 * @return bool
	 */
	public static function propertyExists($class, $property)
	{
		return property_exists($class, $property);
	}
	
	/**
	 * Determines the class is declared or not
	 *
	 * @param $class
	 * @return bool
	 */
	public static function isClassDeclared($class)
	{
		$classes = get_declared_classes();
		if (count($classes) > 0) {
			return in_array(self::class, $classes);
		}
		return false;
	}
}