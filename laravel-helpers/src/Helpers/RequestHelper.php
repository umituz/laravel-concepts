<?php

namespace LaravelHelper\Helpers;

/**
 * Class RequestHelper
 * @package LaravelHelper\Helpers
 */
class RequestHelper
{
	/**
	 * User Agent Details
	 *
	 * @param $request
	 * @return string
	 */
	public static function userAgent($request = null)
	{
		$server = request()->server();
		return CheckHelper::isNotEmpty($request) ?
			(array_key_exists($request, $server) ? $server[$request] : null) :
			$server;
	}
	
	/**
	 * Returns user agent accept language
	 *
	 * @return mixed
	 */
	public static function preferredLanguage()
	{
		$language = request()->getPreferredLanguage();
		$language = explode('_', $language);
		return [
			'languageCode' => array_first($language) ?? null,
			'countryCode' => last($language) ?? null
		];
	}
}
