<?php

namespace App\Http\Resources;

use App\Friend;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class UserResource
 * @package App\Http\Resources
 */
class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        $friendship = Friend::friendship($this->id);
        return [
            'data' => [
                'type' => 'users',
                'user_id' => $this->id,
                'attributes' => [
                    'name' => $this->name,
                    'friendship' => new FriendResource($friendship)
                ]
            ],
            'links' => [
                'self' => url('/users/' . $this->id)
            ]
        ];
    }
}
