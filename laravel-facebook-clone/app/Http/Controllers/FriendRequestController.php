<?php

namespace App\Http\Controllers;

use App\Exceptions\RecordNotFoundException;
use App\Exceptions\ValidationErrorException;
use App\Friend;
use App\Http\Resources\FriendResource;
use App\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;

/**
 * Class FriendRequestController
 * @package App\Http\Controllers
 */
class FriendRequestController extends Controller
{
    /**
     * Store data
     *
     * @return FriendResource
     */
    public function store()
    {
        $data = request()->validate([
            'friend_id' => 'required'
        ]);

        try {

            User::findOrFail($data['friend_id'])
                ->friends()
                ->syncWithoutDetaching(auth()->user());

        } catch (ModelNotFoundException $exception) {
            throw new RecordNotFoundException();
        }

        $friend = Friend::where(['user_id' => auth()->id(), 'friend_id' => $data['friend_id']])->first();

        return new FriendResource($friend);
    }
}
