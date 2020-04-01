<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;

/**
 * Class PostController
 * @package App\Http\Controllers
 */
class PostController extends Controller
{

    /**
     * @return Factory|View
     */
    public function index()
    {
        $posts = Post::filteredPosts();

        return view('post.index', compact('posts'));
    }

    /**
     * @return Factory|View
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * @param $id
     * @return string
     */
    public function delete($id)
    {
        $post = Post::find($id);

        $post->delete();

        return "deleted!";
    }

    /**
     * @param $id
     * @return string
     */
    public function restore($id)
    {
        $post = Post::withTrashed()->find($id);

        $post->restore();

        return "restored!";
    }

    /**
     * @param $id
     * @return string
     */
    public function forceDelete($id)
    {
        $post = Post::withTrashed()->find($id);

        $post->forceDelete();

        return "force Deleted!";
    }

    public function translatable()
    {
//        $post = Post::first();
        $posts = Post::get();

        return view('post.translatable', [
//            'post' => $post,
            'posts' => $posts
        ]);

    }
}
