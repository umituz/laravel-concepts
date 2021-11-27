<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;

/**
 * Class DatabaseHelper
 * @package App\Helpers
 */
class DatabaseHelper
{
	/**
	 * Disable foreign key
	 */
	public static function disableForeignKey()
	{
		DB::statement('SET FOREIGN_KEY_CHECKS = 0');
	}

	/**
	 * Enables foreign key
	 */
	public static function enableForeignKey()
	{
		DB::statement('SET FOREIGN_KEY_CHECKS = 1');
	}

}
