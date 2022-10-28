<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *     title="Product",
 *     description="Product description",
 *     type="object",
 *     schema="Product",
 *     properties={
         @OA\Property(property="id", type="integer", format="int64", description="id column"),
         @OA\Property(property="name", type="string", description="name column"),
         @OA\Property(property="price", type="number", description="price column"),
 *     },
 *     required={"id", "name"}
 * )
 */
class Product extends Model
{
    protected $guarded = [];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
