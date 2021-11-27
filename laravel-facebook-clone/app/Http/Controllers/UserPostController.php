<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostCollection;
use App\User;
use Illuminate\Http\Request;

/**
 * Class UserPostController
 * @package App\Http\Controllers
 */
class UserPostController extends Controller
{
    /**
     * Returns user posts
     *
     * @param User $user
     * @return PostCollection
     */
    public function index(User $user)
    {
        return new PostCollection($user->posts);
    }
}
