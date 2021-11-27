<?php

namespace App\Http\Controllers\Frontend;

use App\Helpers\AuthHelper;
use App\Helpers\CheckHelper;
use App\Helpers\RedirectHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\VoteRequest;
use App\Models\Post;
use App\Models\Vote;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

/**
 * Class UrlController
 * @package App\Http\Controllers
 */
class UrlController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function homepage()
    {
        $posts = Post::getPosts();
        return view('frontend.homepage', ['posts' => $posts]);
    }

    /**
     * @param $slug
     * @return Application|Factory|View
     */
    public function postDetail($slug)
    {
        $post = optional(Post::getPosts())->where('slug', $slug)->first();
        if (!CheckHelper::isNotEmpty($post)) {
            abort(404);
        }
        $previousPost = $post->previous();
        $nextPost = $post->next()->next();
        views($post)->record();
        $vote = AuthHelper::getVote($post->id);
        return view('frontend.post', [
            'post' => $post,
            'previousPost' => $previousPost,
            'nextPost' => $nextPost,
            'vote' => $vote
        ]);
    }

    /**
     * @param VoteRequest $request
     * @param $postId
     * @return RedirectResponse
     */
    public function addPostVote(VoteRequest $request, $postId)
    {
        $post = Post::findOrFail($postId);
        $result = $post->votes()->create([
            'user_id' => AuthHelper::id(),
            'vote' => $request->vote
        ]);
        $data = $this->getRedirectData($result);
        return RedirectHelper::backWithMessage($data['type'], $data['message']);
    }

    /**
     * @param $voteId
     * @return RedirectResponse
     */
    public function removePostVote($voteId)
    {
        $result = Vote::destroy($voteId);
        $data = $this->getRedirectData($result);
        return RedirectHelper::backWithMessage($data['type'], $data['message']);
    }


    /**
     * @param $result
     * @return array
     */
    protected function getRedirectData($result)
    {
        $data = [];
        if ($result) {
            $data['type'] = 'success';
            $data['message'] = __('You have successfully done');
        } else {
            $data['type'] = 'error';
            $data['message'] = __('Something Went Wrong. Please, try again later!');
        }
        return $data;
    }
}
