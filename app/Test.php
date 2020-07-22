<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

/**
 * Class Test
 * @package App
 */
class Test extends Model
{
    use HasTranslations;

    public $translatable = ['name'];

    protected $guarded = [];
}
