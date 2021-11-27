<?php

namespace App\Http\Resources\Club;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ClubCollection extends ResourceCollection
{
    public $collects = ClubResource::class;

    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'total' => $this->resource->count(),
            'data' => $this->resource
        ];
    }
}
