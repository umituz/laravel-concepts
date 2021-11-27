<?php

namespace App\Http\Resources\Fixture;

use Illuminate\Http\Resources\Json\ResourceCollection;

class FixtureCollection extends ResourceCollection
{
    public $collects = FixtureResource::class;

    /**
     * Transform the resource  collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable
     */
    public function toArray($request)
    {
        return [
            'total' => $this->resource->count(),
            'data' => $this->resource
        ];
    }
}
