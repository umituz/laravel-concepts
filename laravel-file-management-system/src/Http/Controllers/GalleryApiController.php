<?php

namespace Gallery\Http\Controllers;

use Gallery\Http\Resources\GalleryResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

/**
 * Class GalleryApiController
 * @package Gallery\Http\Controllers
 */
class GalleryApiController
{
	/**
	 * Get all needed variables
	 *
	 * @return AnonymousResourceCollection
	 */
	public function index()
	{
		$data = ['key' => 'value'];
		return GalleryResource::collection($data);
	}
}