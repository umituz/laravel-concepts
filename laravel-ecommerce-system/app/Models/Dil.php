<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dil extends Model
{
    protected $table    = "dil";
    protected $fillable = ["group","key","text"];

    public $timestamps = false;
}
