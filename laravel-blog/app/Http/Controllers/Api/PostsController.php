<?php

namespace App\Http\Controllers\Api;

use App\Enumerations\StatusEnumeration;
use App\Helpers\AuthHelper;
use App\Helpers\DateHelper;
use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostCollection;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

/**
 * Class PostsController
 * @package App\Http\Controllers\Api
 */
class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse|object
     */
    public function index()
    {
        $posts = Post::skipCache()
            ->with(['user' => function ($query) {
                $query->select('id', 'name');
            }])
            ->select('id', 'user_id', 'title', 'slug', 'content', 'status', 'published_at')
            ->get();
        $collection = new PostCollection($posts);
        return response()->json($collection)->setStatusCode(200);
    }

    /**
     * @return JsonResponse
     */
    public function export()
    {
        $posts = AuthHelper::user()->posts()->get();
        $collection = new PostCollection($posts);
        return response()->json($collection)->setStatusCode(200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse|Response|object
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:191',
            'content' => 'required'
        ]);
        if ($validator->fails()) {
            return ResponseHelper::validatorFails($validator);
        }
        $publishedAt = now();
        if (request()->has('published_at')) {
            $publishedAt = DateHelper::timestamp(request('published_at'));
        }
        $post = AuthHelper::user()->posts()->create([
            'title' => request('title'),
            'content' => request('title'),
            'published_at' => $publishedAt,
        ]);
        $resource = new PostResource($post);
        return response()->json($resource)->setStatusCode(201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return JsonResponse|Response|object
     */
    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        if (!$post) {
            return ResponseHelper::notFound();
        }
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'content' => 'required'
        ]);
        if ($validator->fails()) {
            return ResponseHelper::validatorFails($validator);
        }
        $post->update([
            'title' => request('title'),
            'content' => request('content'),
        ]);
        $resource = new PostResource($post);
        return response()->json($resource)->setStatusCode(200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return JsonResponse|Response|object
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        if (!$post) {
            return ResponseHelper::notFound();
        }
        $post->delete();
        return ResponseHelper::noContent();
    }

    /**
     * @param int $id
     * @return JsonResponse|object
     */
    public function publish(int $id)
    {
        $post = Post::find($id);
        if (!$post) {
            return ResponseHelper::notFound();
        }
        $post->update([
            'published_at' => now(),
            'status' => StatusEnumeration::PUBLISHED
        ]);
        $resource = new PostResource($post);
        return response()->json($resource)->setStatusCode(200);
    }

    /**
     * @param int $id
     * @return JsonResponse|object
     */
    public function unpublish(int $id)
    {
        $post = Post::find($id);
        if (!$post) {
            return ResponseHelper::notFound();
        }
        $post->update([
            'published_at' => null,
            'status' => StatusEnumeration::DRAFT
        ]);
        $resource = new PostResource($post);
        return response()->json($resource)->setStatusCode(200);
    }
}
