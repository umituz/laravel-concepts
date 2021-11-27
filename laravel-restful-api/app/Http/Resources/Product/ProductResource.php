<?php

namespace App\Http\Resources\Product;

use App\Http\Resources\Category\CategoryResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
//        return parent::toArray($request);

        self::withoutWrapping();

        return [
            '_id' => $this->id,
            'name' => $this->name,
            'price' => $this->price,
//            'categories' => CategoryResource::collection($this->categories)
            'categories' => CategoryResource::collection($this->whenLoaded('categories'))
        ];
    }
}
