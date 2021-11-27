<?php

namespace App;

use App\Scopes\ReverseScope;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Post
 * @package App
 */
class Post extends Model
{
    /**
     * Turn off the mass assignment
     *
     * @var array
     */
    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new ReverseScope());
    }

    /**
     * Returns the user of the post
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
