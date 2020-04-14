<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Rennokki\QueryCache\Traits\QueryCacheable;

/**
 * Class PostContent
 * @package App
 */
class PostContent extends Model
{
    use QueryCacheable;

    /**
     * @var array
     */
    protected $guarded = [];
}
