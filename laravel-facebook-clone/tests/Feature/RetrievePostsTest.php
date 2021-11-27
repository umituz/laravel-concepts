<?php

namespace Tests\Feature;

use App\Friend;
use App\Http\Traits\TestTrait;
use App\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * Class RetrievePostsTest
 * @package Tests\Feature
 */
class RetrievePostsTest extends TestCase
{
    use RefreshDatabase, TestTrait;

    /**
     * @test
     */
    public function a_user_can_retrieve_posts()
    {
        $this->withoutExceptionHandling();

        $user = $this->user();

        $anotherUser = $this->user();

        $this->actingAs($user, 'api');

        $posts = factory(Post::class, 2)->create(['user_id' => $anotherUser->id]);

        Friend::create([
            'user_id' => $user->id,
            'friend_id' => $anotherUser->id,
            'status' => 1,
            'confirmed_at' => now()
        ]);

        $response = $this->get('/api/posts');

        $response->assertStatus(200)
            ->assertJson([
                'data' => [
                    [
                        'data' => [
                            'type' => 'posts',
                            'post_id' => $posts->last()->id,
                            'attributes' => [
                                'body' => $posts->last()->body,
                                'image' => $posts->last()->image,
                                'posted_at' => $posts->last()->created_at->diffForHumans(),
                            ]
                        ]
                    ],
                    [
                        'data' => [
                            'type' => 'posts',
                            'post_id' => $posts->first()->id,
                            'attributes' => [
                                'body' => $posts->first()->body,
                                'image' => $posts->first()->image,
                                'posted_at' => $posts->first()->created_at->diffForHumans(),
                            ]
                        ]
                    ]
                ],
                'links' => [
                    'self' => url('/posts')
                ]
            ]);
    }

    /**
     * @test
     */
    public function a_user_can_retrieve_only_their_posts()
    {
        $user = $this->user();

        $this->actingAs($user, 'api');

        $post = factory(Post::class)->create();

        $response = $this->get('/api/posts');

        $response->assertStatus(200)
            ->assertExactJson([
                'data' => [],
                'links' => [
                    'self' => url('/posts')
                ]
            ]);
    }
}
