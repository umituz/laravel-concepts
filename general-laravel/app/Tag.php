<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

/**
 * Class Tag
 * @package App
 */
class Tag extends Model
{
    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * @return MorphToMany
     */
    public function posts()
    {
        return $this->morphedByMany(Post::class,'taggable');
    }

    /**
     * @return MorphToMany
     */
    public function videos()
    {
        return $this->morphedByMany(Video::class,'taggable');
    }
}
