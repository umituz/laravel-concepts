<?php

namespace App\Http\Resources\Club;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Helpers\CarbonHelper;

class ClubResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array|Arrayable
     */
    public function toArray($request)
    {
        self::withoutWrapping();

        return array(
            'name' => $this->name,
            'scored_goal' => $this->scored_goal,
            'conceded_goal' => $this->conceded_goal,
            'point' => $this->point,
            'capability' => $this->capability,
            'created_at' => CarbonHelper::formatDate($this->created_at),

        );
    }
}
