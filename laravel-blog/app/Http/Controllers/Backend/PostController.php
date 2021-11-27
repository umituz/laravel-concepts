<?php

namespace App\Http\Controllers\Backend;

use App\Enumerations\StatusEnumeration;
use App\Helpers\AuthHelper;
use App\Helpers\CheckHelper;
use App\Helpers\DateHelper;
use App\Helpers\RedirectHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Traits\AuthTrait;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

/**
 * Class PostController
 * @package App\Http\Controllers
 */
class PostController extends Controller
{
    use AuthTrait;

    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $posts = Post::getPostsViaRole();
        return view('backend.posts.index', ['posts' => $posts]);
    }

    /**
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('backend.posts.create');
    }

    /**
     * @param PostRequest $request
     * @return RedirectResponse
     */
    public function store(PostRequest $request)
    {
        if (request()->has('publish_now')) {
            $publishedAt = now();
            $status = 1;
        } else {
            $scheduledDateTime = request('date') . ' ' . request('time');
            $publishedAt = DateHelper::timestamp($scheduledDateTime);
            $status = 2;
            if (!CheckHelper::isNotEmpty($publishedAt)) {
                return RedirectHelper::backWithMessage('error',__('Publish now or you pick a date'));
            }
        }
        request()->merge(['published_at' => $publishedAt]);
        request()->merge(['status' => $status]);
        AuthHelper::user()->posts()->create(request()->all());
        return RedirectHelper::backWithMessage(
            'success',
            __('Data has been added successfully'),
            $this->redirectTo()
        );
    }

    /**
     * @param $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('backend.posts.edit', ['post' => $post]);
    }

    /**
     * @param PostRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(PostRequest $request, $id)
    {
        $post = Post::findOrFail($id);
        $post->update($request->all());
        return RedirectHelper::backWithMessage(
            'success',
            __('Data updated successfully'),
            $this->redirectTo()
        );
    }

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        Post::destroy($id);
        return RedirectHelper::backWithMessage('success', __('Data has been deleted successfully'));
    }

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function publish($id)
    {
        $post = Post::findOrFail($id);
        $post->published_at = now();
        $post->status = StatusEnumeration::PUBLISHED;
        $post->save();
        return RedirectHelper::backWithMessage('success', __('Data has been published successfully'));
    }

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function unpublish($id)
    {
        $post = Post::findOrFail($id);
        $post->published_at = null;
        $post->status = StatusEnumeration::DRAFT;
        $post->save();
        return RedirectHelper::backWithMessage('success', __('Data has been unpublished successfully'));
    }
}
