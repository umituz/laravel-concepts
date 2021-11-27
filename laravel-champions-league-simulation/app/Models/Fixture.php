<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fixture extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'home_club_id',
        'away_club_id',
        'home_club_goal',
        'away_club_goal',
        'week',
        'result',
    ];

    public function homeClub()
    {
        return $this->belongsTo(Club::class, 'home_club_id', 'id');
    }

    public function awayClub()
    {
        return $this->belongsTo(Club::class, 'away_club_id', 'id');
    }
}
