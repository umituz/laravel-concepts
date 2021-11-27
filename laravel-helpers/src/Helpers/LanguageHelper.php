<?php

namespace LaravelHelper\Helpers;

use Illuminate\Support\Facades\App;

/**
 * Class LanguageHelper
 * @package LaravelHelper\Helpers
 */
class LanguageHelper
{
	/**
	 * Changes the language of the application.
	 *
	 * @param $locale
	 * @return bool
	 */
	public static function setLocale($locale)
	{
		App::setLocale($locale);
		session()->put('locale', $locale);
	}
}
