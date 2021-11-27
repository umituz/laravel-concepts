<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Friend
 * @package App
 */
class Friend extends Model
{
    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * @var array
     */
    protected $dates = ['confirmed_at'];

    /**
     * Returns friendship via the given user id
     *
     * @param $userId
     * @return mixed
     */
    public static function friendship($userId)
    {
        return (new static())
            ->where(function ($query) use ($userId) {
                return $query->where('user_id', auth()->id())->where('friend_id', $userId);
            })
            ->orWhere(function ($query) use ($userId) {
                return $query->where('friend_id', auth()->id())->where('user_id', $userId);
            })
            ->first();
    }

    /**
     * Returns friendships collection
     *
     * @return mixed
     */
    public static function friendships()
    {
        return (new static())
            ->whereNotNull('confirmed_at')
            ->where(function ($query) {
                return $query->where('user_id', auth()->id())->orWhere('friend_id', auth()->id());
            })
            ->get();
    }
}
