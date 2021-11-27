<?php

namespace Tests\Browser;

use App\Models\Post;
use App\Models\User;
use App\Models\Vote;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\DuskTestCase;

/**
 * Class PostDetailTest
 * @package Tests\Browser
 */
class PostDetailTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * A Dusk test example.
     *
     * @test
     * @return void
     */
    public function seeEachPostDetails()
    {
        $posts = Post::factory()->count(10)->create();
        $this->browse(function ($browser) use ($posts) {
            foreach ($posts as $post) {
                $browser->visit('/post/' . $post->slug)
                    ->assertSeeIn('h2', $post->title)
                    ->assertSeeIn('.content', $post->content);
            }
        });

    }

    /**
     * @throws \Throwable
     * @test
     */
    public function userCanVoteAnyArticles()
    {
        $post = Post::factory()->create();
        $user = User::factory()->create();

        $this->browse(function ($browser) use ($post, $user) {
            $vote = 5;
            $browser->loginAs($user)
                ->visit('/post/' . $post->slug)
                ->assertSee(__('Vote'))
//                ->value('#vote.form-control', $vote)
//                ->press(__('Vote Now'))
//                ->waitForText(__('Your Vote') . ' : ' . $vote)
            ;
        });
    }

    /**
     * @throws \Throwable
     * @test
     */
    public function userCanDeleteTheVote()
    {
        $post = Post::factory()->create();
        $user = User::factory()->create();
        $vote = 3;
        Vote::factory()->create([
            'user_id' => $user->id,
            'post_id' => $post->id,
            'vote' => $vote
        ]);
        $this->browse(function ($browser) use ($post, $user, $vote) {
            $browser->loginAs($user)
                ->visit('/post/' . $post->slug)
                ->assertSee(__('Your Vote') . ' : ' . $vote)
                ->clickLink(__('Remove My Vote'))
                ->waitForText(__('Vote'));
        });
    }

}
