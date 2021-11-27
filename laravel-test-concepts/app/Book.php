<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;
use mysql_xdevapi\Exception;

/**
 * Class Book
 * @package App
 */
class Book extends Model
{
    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * Redirect path for a book
     * @return string
     */
    public function path()
    {
        return '/books/' . $this->id;
    }

    /**
     * @param $user
     */
    public function checkout($user)
    {
        $this->reservations()->create([
            'user_id' => $user->id,
            'checked_out_at' => now(),
        ]);
    }

    /**
     * @param $user
     * @throws \Exception
     */
    public function checkin($user)
    {
        $reservation = $this->reservations()
            ->where('user_id', $user->id)
            ->whereNotNull('checked_out_at')
            ->whereNull('checked_in_at')
            ->first();

        if(is_null($reservation)){
            throw new \Exception();
        }

        $reservation->update([
            'checked_in_at' => now()
        ]);

    }

    /**
     * @param $author
     */
    public function setAuthorIdAttribute($author)
    {
        $this->attributes['author_id'] = (Author::firstOrCreate([
            'name' => $author
        ]))->id;
    }

    /**
     * @return HasMany
     */
    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}
