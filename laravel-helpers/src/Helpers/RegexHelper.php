<?php

namespace LaravelHelper\Helpers;

/**
 * Class RegexHelper
 * @package LaravelHelper\Helpers
 */
class RegexHelper
{
	/**
	 * Returns the a href pattern
	 *
	 * @return string
	 */
	public static function aHrefPattern()
	{
		return '/<a(.*?)href="([^"]+)"(.*?)>/i';
	}
	
	/**
	 * Returns the img src pattern
	 *
	 * @return string
	 */
	public static function imgSrcPattern()
	{
		return '/<img(.*?)src="([^"]+)"(.*?)>/i';
	}
	
	/**
	 * Clears url in the given string
	 *
	 * @param $source
	 * @return string|string[]|null
	 */
	public static function clearUrl($source)
	{
		return preg_replace('~' . config('helpers.app.url') . '~', '', $source);
	}
	
	/**
	 * Adds app url as the prefix to each array elements
	 *
	 * @param $source
	 * @return string|string[]|null
	 */
	public static function addUrl($source)
	{
		return preg_filter('/^/i', config('helpers.app.url'), $source);
	}
	
	/**
	 * Adds app url as the prefix to each array elements
	 *
	 * @param $source
	 * @return string|string[]|null
	 */
	public static function isAppUrl($source)
	{
		return preg_match('/^/i', config('helpers.app.url'), $source);
	}

}