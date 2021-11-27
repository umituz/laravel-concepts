<?php

namespace App\Http\Resources\Fixture;

use App\Helpers\CarbonHelper;
use Illuminate\Http\Resources\Json\JsonResource;

class FixtureResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable
     */
    public function toArray($request)
    {
        self::withoutWrapping();
        $createdAt = $this->created_at ?? $this['created_at'];
        return [
            'home_club' => $this->homeClub->name ?? ($this['homeClub']->name ?? ''),
            'home_club_id' => $this->home_club_id ?? ($this['home_club_id'] ?? ''),
            'home_club_goal' => $this->home_club_goal ?? $this['home_club_goal'],
            'away_club_goal' => $this->away_club_goal ?? $this['away_club_goal'],
            'away_club' => $this->awayClub->name ?? ($this['awayClub']->name ?? ''),
            'away_club_id' => $this->away_club_id ?? ($this['away_club_id'] ?? ''),
            'week' => $this->week ?? $this['week'],
            'result' => $this->result ?? ($this['result'] ?? ''),
            'created_at' => CarbonHelper::formatDate($createdAt),
        ];
    }

}
