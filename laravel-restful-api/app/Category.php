<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];

//    protected $hidden = ['slug'];

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
