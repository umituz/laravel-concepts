<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;

/**
 * Class AuthUserController
 * @package App\Http\Controllers
 */
class AuthUserController extends Controller
{
    /**
     * Returns authenticated user
     *
     * @return UserResource
     */
    public function show()
    {
        return new UserResource(auth()->user());
    }
}
