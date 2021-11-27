<?php

namespace Gallery\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class GalleryResource
 * @package Gallery\Http\Resources
 */
class GalleryResource extends JsonResource
{
	/**
	 * Transform the resource into an array.
	 *
	 * @param Request $request
	 * @return array
	 */
	public function toArray($request)
	{
		self::withoutWrapping();
		return [
			'config' => $this->config
		];
	}
}