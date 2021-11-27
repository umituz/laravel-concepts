<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\User;

/**
 * Class UserController
 * @package App\Http\Controllers
 */
class UserController extends Controller
{
    /**
     * Shows user
     *
     * @param User $user
     * @return UserResource
     */
    public function show(User $user)
    {
        return new UserResource($user);
    }
}
