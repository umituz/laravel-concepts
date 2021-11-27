<?php

namespace App\Http\Controllers;

use App\Friend;
use App\Http\Resources\PostCollection;
use App\Http\Resources\PostResource;
use App\Post;

/**
 * Class PostController
 * @package App\Http\Controllers
 */
class PostController extends Controller
{
    /**
     * Returns all posts
     *
     * @return PostCollection
     */
    public function index()
    {
        $friends = Friend::friendships();

        if ($friends->isEmpty()) {
            return new PostCollection(request()->user()->posts);
        }

        $posts = Post::whereIn('user_id', [$friends->pluck('user_id'), $friends->pluck('friend_id')])->get();
        return new PostCollection($posts);
    }

    /**
     * Stores data
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function store()
    {
        $data = request()->validate([
            'data.attributes.body' => ''
        ]);

        $data = $data['data']['attributes'];

        $post = request()->user()->posts()->create($data);

        return new PostResource($post);
    }
}
