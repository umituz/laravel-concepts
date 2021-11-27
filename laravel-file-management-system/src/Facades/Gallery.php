<?php

namespace Gallery\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class Gallery
 * @package Gallery\Facades
 *
 * @see \Gallery\GalleryLibrary
 */
class Gallery extends Facade
{
	/**
	 * Creates an alias for the GalleryLibrary class
	 *
	 * @return string
	 */
	protected static function getFacadeAccessor()
	{
		return 'Gallery';
	}
}