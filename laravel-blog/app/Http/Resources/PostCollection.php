<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

/**
 * Class PostCollection
 * @package App\Http\Resources
 */
class PostCollection extends ResourceCollection
{
    /**
     * @var string
     */
    public $collects = PostResource::class;

    /**
     * Transform the resource collection into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'total' => $this->resource->count(),
            'data' => $this->resource
        ];
    }
}
