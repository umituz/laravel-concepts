<?php

namespace Commander;

/**
 * Class Commander
 * @package Commander
 */
class Commander
{
	/**
	 * @return bool
	 */
	public static function configNotPublished()
	{
		return is_null(config('commander'));
	}
	
	/**
	 * @param $default
	 * @param $type
	 * @return string
	 */
	public static function getNamespace($default, $type)
	{
		if (self::configNotPublished()) {
			
			return $default;
			
		}
		
		if (file_exists(config('commander.rootDirectory'))) {
			return
				config('commander.rootDirectory')
				. DIRECTORY_SEPARATOR .
				config('commander.defaultNamespace.' . $type);
		} else {
			return 'Directory ' .
				config('commander.rootDirectory') .
				' does not exist. Check the rootDirectory in the commander config file';
		}
	}
	
	/**
	 * @param $directory
	 * @return bool
	 */
	public static function directoryExists($directory)
	{
		if (!file_exists($directory)) {
			
			return 'Directory ' .
				config('commander.rootDirectory') .
				' does not exist. Check the rootDirectory in the commander config file';
		}
		
		return true;
	}
	
	/**
	 * Just Test Purpose
	 */
	public static function test()
	{
		dd(config('commander'));
	}
}