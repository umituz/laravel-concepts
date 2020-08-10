<?php

namespace App\Helpers;

/**
 * Class PerformanceHelper
 * @package App\Helpers
 */
class PerformanceHelper
{
	/**
	 * Returns memory usage
	 *
	 * @return string
	 */
	public static function memoryUsage()
	{
		$memoryUsage = memory_get_usage(true);
		if ($memoryUsage < 1024) {
			return $memoryUsage . " bytes";
		} elseif ($memoryUsage < 1048576) {
			return round($memoryUsage / 1024, 2) . " kilobytes";
		} else {
			return round($memoryUsage / 1048576, 2) . " megabytes";
		}
	}

	/**
	 * Returns the time of page load
	 *
	 * @param $startTime
	 * @param $endTime
	 * @return float
	 */
	public static function pageLoadTime($startTime, $endTime)
	{
		$timeTaken = ($endTime - $startTime) * 1000;
		return round($timeTaken, 5);
	}
}
