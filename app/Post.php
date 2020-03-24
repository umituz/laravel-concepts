<?php

namespace App;

use App\Filters\Active;
use App\Filters\MaxCount;
use App\Filters\Sort;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pipeline\Pipeline;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

/**
 * Class Post
 * @package App
 */
class Post extends Model implements TranslatableContract
{
    use Translatable;

    public $translatedAttributes = ['title'];

    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * @var bool
     */
    public $timestamps = false;

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
