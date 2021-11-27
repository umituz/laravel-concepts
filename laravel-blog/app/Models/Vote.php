<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Whtht\PerfectlyCache\Traits\PerfectlyCachable;

/**
 * Class Vote
 * @package App\Models
 */
class Vote extends Model
{
    use HasFactory, PerfectlyCachable;

    /**
     * @var string[]
     */
    protected $fillable = [
        'user_id', 'post_id', 'vote'
    ];

    /**
     * @return BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return BelongsTo
     */
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
