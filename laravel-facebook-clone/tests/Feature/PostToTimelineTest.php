<?php

namespace Tests\Feature;

use App\Http\Traits\TestTrait;
use App\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

/**
 * Class PostToTimelineTest
 * @package Tests\Feature
 */
class PostToTimelineTest extends TestCase
{
    use RefreshDatabase, TestTrait;

    /**
     * @test
     */
    public function a_user_can_post_a_text_post()
    {
        $user = $this->user();

        $this->withoutExceptionHandling();

        $this->actingAs($user, 'api');

        $response = $this->post('/api/posts', [
            'data' => [
                'type' => 'posts',
                'attributes' => [
                    'posted_by' => [
                        'data' => [
                            'attributes' => [
                                'name' => $user->name
                            ]
                        ]
                    ],
                    'body' => 'Testing Body'
                ]
            ]
        ]);

        $post = Post::first();

        $this->assertCount(1, Post::all());
        $this->assertEquals($user->id, $post->user_id);
        $this->assertEquals('Testing Body', $post->body);

        $response->assertStatus(201)
            ->assertJson([
                'data' => [
                    'type' => 'posts',
                    'post_id' => $post->id,
                    'attributes' => [
                        'body' => 'Testing Body'
                    ]
                ],
                'links' => [
                    'self' => url('/posts/' . $post->id)
                ]
            ]);
    }
}
