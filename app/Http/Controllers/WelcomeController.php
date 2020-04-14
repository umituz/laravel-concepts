<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

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
        $posts = Post::with(['contents' => function ($query) {
            return $query->cacheFor(60 * 60)//                ->cacheTags(['page-with-contents'])
                ;
        }])->first();
        return view('welcome', [
            'posts' => $posts
        ]);
    }
}
