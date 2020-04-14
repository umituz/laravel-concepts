<?php

namespace App;

use App\Filters\Active;
use App\Filters\MaxCount;
use App\Filters\Sort;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pipeline\Pipeline;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Rennokki\QueryCache\Traits\QueryCacheable;

/**
 * Class Post
 * @package App
 */
class Post extends Model implements TranslatableContract
{
    use Translatable, QueryCacheable;

    /**
     * QueryCacheable attributes
     *
     * @var int
     */
    public $cacheFor = 3600; // cache time, in seconds

    /**
     * @var array
     */
    public $translatedAttributes = ['title', 'content'];

    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * @var bool
     */
    public $timestamps = false;

//    /**
//     * @var array
//     */
//    protected $with = ['contents'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contents()
    {
        return $this->hasMany(PostContent::class);
    }

    /**
     * @return mixed
     */
    public static function filteredPosts()
    {
        return app(Pipeline::class)
            ->send(Post::query())
            ->through([
                Active::class,
                Sort::class,
                MaxCount::class,
            ])
            ->thenReturn()
            ->paginate(3);
//            ->get();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }
}
