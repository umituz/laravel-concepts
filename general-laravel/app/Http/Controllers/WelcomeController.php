<?php

namespace App\Http\Controllers;

use App\Post;

/**
 * Class WelcomeController
 * @package App\Http\Controllers
 */
class WelcomeController extends Controller
{
    /**
     * Returns welcome page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $posts = Post::with(['contents'])->first();
        return view('welcome', [
            'posts' => $posts
        ]);
    }
}
