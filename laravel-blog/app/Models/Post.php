<?php

namespace App\Models;

use App\Enumerations\StatusEnumeration;
use App\Helpers\AuthHelper;
use App\Helpers\CalculateHelper;
use App\Helpers\ViewHelper;
use App\Scopes\OrderBy;
use Cviebrock\EloquentSluggable\Sluggable;
use CyrildeWit\EloquentViewable\Contracts\Viewable;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Translation\Translator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Whtht\PerfectlyCache\Traits\PerfectlyCachable;

/**
 * Class Post
 * @package App\Models
 */
class Post extends Model implements Viewable
{
    use HasFactory, PerfectlyCachable, InteractsWithViews, Sluggable;

    /**
     * @var string[]
     */
    protected $fillable = [
        'title', 'slug', 'content', 'status', 'user_id', 'published_at'
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        'published_at' => 'datetime',
    ];

    /**
     * Boot method
     */
    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new OrderBy);
    }

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    /**
     * @return mixed
     */
    public function previous()
    {
        return $this->find(--$this->id);
    }

    /**
     * @return mixed
     */
    public function next()
    {
        return $this->find(++$this->id);
    }

    /**
     * @return int
     */
    public function uniqueViewCount()
    {
        return ViewHelper::uniqueViewCount($this);
    }

    /**
     * @return BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return mixed
     */
    public static function getPostsViaRole()
    {
        $posts = self::with('user')->select('id', 'title', 'slug', 'status', 'user_id', 'published_at', 'created_at')->get();
        if (!AuthHelper::hasRole('Admin')) {
            $posts = $posts->where('user_id', AuthHelper::id());
        }
        return $posts;
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopePublished($query)
    {
        return $query->where('status', StatusEnumeration::PUBLISHED);
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeScheduled($query)
    {
        return $query->where('status', StatusEnumeration::SCHEDULED);
    }

    /**
     * @param $value
     * @return array|Application|Translator|string|null
     */
    public function getStatusAttribute($value)
    {
        switch ($value) {
            case 0:
                return __('DRAFT');
            case 1:
                return __('PUBLISHED');
            default:
                return __('SCHEDULED');
        }
    }

    /**
     * @return mixed
     */
    public static function getPosts()
    {
        return self::with('user', 'votes')
            ->select('id', 'user_id', 'title', 'slug', 'content', 'published_at')
            ->published()
            ->get();
    }

    /**
     * @return HasMany
     */
    public function votes()
    {
        return $this->hasMany(Vote::class);
    }

    /**
     * @return float|string
     */
    public function getVotingResultAttribute()
    {
        $votes = $this->votes;
        $totalVoteCount = $votes->count();
        if ($totalVoteCount == 0) {
            return __('No Votes');
        }
        return CalculateHelper::postVotingResult($votes, $totalVoteCount);
    }

    /**
     * @return false|string
     */
    public function getIntroductionAttribute()
    {
        return substr($this->content, 0, 200) . '...';
    }

    public function a()
    {
        return 1;
    }
}
