<?php

namespace LaravelHelper\Helpers;

use Illuminate\Support\Collection;

/**
 * Class CollectionHelper
 * @package LaravelHelper\Helpers
 */
class CollectionHelper
{
	/**
	 * Merges unlimited collection sent as parameter.
	 * if any collection is empty returns null
	 * If not finally returns a single object.
	 *
	 * @return Collection|object|null
	 */
	public static function mergeLimitlessCollection()
	{
		// Gets the number of collections sent as unlimited parameter
		$arguments = func_num_args();
		if ($arguments > 0) {
			$collection = collect();
			for ($i = 0; $i < $arguments; $i++) {
				// Return null if any collection is empty
				if (func_get_arg($i) == null) {
					return null;
				}
				$collection = $collection->merge(func_get_arg($i));
			}
			// Change data type from array to object
			$collection = (object)$collection->all();
			return $collection;
		}
		return null;
	}
	
	/**
	 * Performs the breakout process within the collection with the given column name.
	 * Then covers to array
	 * If there is no collection returns empty array
	 *
	 * @param $collection
	 * @param string $column
	 * @param null $key
	 * @return Collection
	 */
	public static function pluckToArray($collection, $column = 'id', $key = null)
	{
		if ($collection->isNotEmpty()) {
			if (CheckHelper::isNotEmpty($key)) {
				return $collection->pluck($column, $key)->toArray();
			}
			return $collection->pluck($column)->toArray();
		}
		return collect([]);
	}
}
