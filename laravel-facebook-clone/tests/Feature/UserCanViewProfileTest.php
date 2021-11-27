<?php

namespace Tests\Feature;

use App\Http\Traits\TestTrait;
use App\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

/**
 * Class UserCanViewProfileTest
 * @package Tests\Feature
 */
class UserCanViewProfileTest extends TestCase
{
    use RefreshDatabase, TestTrait;

    /**
     * @test
     */
    public function a_user_can_view_user_profiles()
    {
        $this->withoutExceptionHandling();

        $user = $this->user();

        $this->actingAs($user, 'api');

        $post = factory(Post::class)->create();

        $response = $this->get('/api/users/' . $user->id);

        $response->assertStatus(200)
            ->assertJson([
                'data' => [
                    'type' => 'users',
                    'user_id' => $user->id,
                    'attributes' => [
                        'name' => $user->name
                    ]
                ],
                'links' => [
                    'self' => url('/users/' . $user->id)
                ]
            ]);
    }

    /**
     * @test
     */
    public function a_user_can_fetch_posts_for_a_profile()
    {
        $this->withoutExceptionHandling();

        $user = $this->user();

        $this->actingAs($user, 'api');

        $post = factory(Post::class)->create(['user_id' => $user->id]);

        $response = $this->get('/api/users/' . $user->id . '/posts');

        $response->assertStatus(200)
            ->assertJson([
                'data' => [
                    [
                        'data' => [
                            'type' => 'posts',
                            'post_id' => $post->id,
                            'attributes' => [
                                'body' => $post->body,
                                'image' => $post->image,
                                'posted_at' => $post->created_at->diffForHumans(),
                                'posted_by' => [
                                    'data' => [
                                        'attributes' => [
                                            'name' => $user->name
                                        ]
                                    ]
                                ],
                            ]
                        ],
                        'links' => [
                            'self' => url('/posts/' . $post->id)
                        ]
                    ]
                ]
            ]);
    }
}
