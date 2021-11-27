<?php

namespace Tests\Feature;

use App\Friend;
use App\Http\Traits\TestTrait;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * Class FriendsTest
 * @package Tests\Feature
 */
class FriendsTest extends TestCase
{
    use RefreshDatabase, TestTrait;

    /**
     * @test
     */
    public function a_user_can_send_a_friend_request()
    {
        $this->withoutExceptionHandling();

        $user = $this->user();
        $this->actingAs($user, 'api');

        $anotherUser = $this->user();

        $response = $this->post('/api/friend-request', [
            'friend_id' => $anotherUser->id
        ])->assertStatus(200);

        $friendRequest = Friend::first();

        $this->assertNotNull($friendRequest);
        $this->assertEquals($anotherUser->id, $friendRequest->friend_id);
        $this->assertEquals($user->id, $friendRequest->user_id);

        $response->assertJson([
            'data' => [
                'type' => 'friend-request',
                'friend_request_id' => $friendRequest->id,
                'attributes' => [
                    'confirmed_at' => null
                ]
            ],
            'links' => [
                'self' => url('/users/' . $anotherUser->id)
            ]
        ]);

    }

    /**
     * @test
     */
    public function a_user_can_send_a_friend_request_only_once()
    {
        $this->withoutExceptionHandling();

        $user = $this->user();
        $this->actingAs($user, 'api');

        $anotherUser = $this->user();

        $this->post('/api/friend-request', [
            'friend_id' => $anotherUser->id
        ])->assertStatus(200);

        $this->post('/api/friend-request', [
            'friend_id' => $anotherUser->id
        ])->assertStatus(200);

        $friendRequest = Friend::all();

        $this->assertCount(1,$friendRequest);
    }

    /**
     * @test
     */
    public function only_valid_user_can_be_friend_requested()
    {
        $user = $this->user();
        $this->actingAs($user, 'api');

        $response = $this->post('/api/friend-request', [
            'friend_id' => 123
        ])->assertStatus(404);

        $friendRequest = Friend::first();

        $this->assertNull($friendRequest);

        $response->assertJson([
            'errors' => [
                'code' => 404,
                'title' => 'Record Not Found',
                'detail' => 'Unable to locate the record with the given information'
            ]
        ]);
    }

    /**
     * @test
     */
    public function friend_requests_can_be_accepted()
    {
        $user = $this->user();
        $this->actingAs($user, 'api');

        $anotherUser = $this->user();

        $this->post('/api/friend-request', [
            'friend_id' => $anotherUser->id
        ])->assertStatus(200);

        $response = $this->actingAs($anotherUser, 'api')
            ->post('/api/friend-request-response', [
                'user_id' => $user->id,
                'status' => 1
            ])->assertStatus(200);

        $friendRequest = Friend::first();

        $this->assertNotNull($friendRequest->confirmed_at);
        $this->assertInstanceOf(Carbon::class, $friendRequest->confirmed_at);
        $this->assertEquals(now()->startOfSecond(), $friendRequest->confirmed_at);
        $this->assertEquals(1, $friendRequest->status);

        $response->assertJson([
            'data' => [
                'type' => 'friend-request',
                'friend_request_id' => $friendRequest->id,
                'attributes' => [
                    'confirmed_at' => $friendRequest->confirmed_at->diffForHumans(),
                    'friend_id' => $friendRequest->friend_id,
                    'user_id' => $friendRequest->user_id,
                ]
            ],
            'links' => [
                'self' => url('/users/' . $anotherUser->id)
            ]
        ]);

    }

    /**
     * @test
     */
    public function only_valid_friend_requests_can_be_accepted()
    {
        $anotherUser = $this->user();

        $response = $this->actingAs($anotherUser, 'api')
            ->post('/api/friend-request-response', [
                'user_id' => 123,
                'status' => 1
            ])->assertStatus(404);

        $friendRequest = Friend::first();

        $response->assertJson([
            'errors' => [
                'code' => 404,
                'title' => 'Record Not Found',
                'detail' => 'Unable to locate the record with the given information'
            ]
        ]);

    }

    /**
     * @test
     */
    public function only_the_recipient_can_accept_a_friend_request()
    {
        $user = $this->user();
        $this->actingAs($user, 'api');

        $anotherUser = $this->user();

        $this->post('/api/friend-request', [
            'friend_id' => $anotherUser->id
        ])->assertStatus(200);

        $differentUser = $this->user();

        $response = $this->actingAs($differentUser, 'api')
            ->post('/api/friend-request-response', [
                'user_id' => $user->id,
                'status' => 1
            ])->assertStatus(404);

        $friendRequest = Friend::first();

        $this->assertNull($friendRequest->confirmed_at);
        $this->assertEquals(0, $friendRequest->status);

        $response->assertJson([
            'errors' => [
                'code' => 404,
                'title' => 'Record Not Found',
                'detail' => 'Unable to locate the record with the given information'
            ]
        ]);
    }

    /**
     * @test
     */
    public function friend_id_is_required_for_friend_requests()
    {
        $user = $this->user();
        $response = $this->actingAs($user, 'api')
            ->post('/api/friend-request', [
                'friend_id' => ''
            ])->assertStatus(422);

        $responseString = json_decode($response->getContent(), true);

        $this->assertArrayHasKey('friend_id', $responseString['errors']['meta']);
    }

    /**
     * @test
     */
    public function user_id_and_status_are_required_for_friend_request_responses()
    {
        $user = $this->user();

        $response = $this->actingAs($user, 'api')
            ->post('/api/friend-request-response', [
                'user_id' => '',
                'status' => ''
            ])->assertStatus(422);

        $responseString = json_decode($response->getContent(), true);

        $this->assertArrayHasKey('user_id', $responseString['errors']['meta']);
        $this->assertArrayHasKey('status', $responseString['errors']['meta']);

    }

    /**
     * @test
     */
    public function a_friendship_is_retrieved_when_fetching_the_profile()
    {
        $user = $this->user();
        $this->actingAs($user, 'api');
        $anotherUser = $this->user();

        $friendRequest = Friend::create([
            'user_id' => $user->id,
            'friend_id' => $anotherUser->id,
            'confirmed_at' => now()->subDay(),
            'status' => 1
        ]);

        $this->get('/api/users/' . $anotherUser->id)
            ->assertStatus(200)
            ->assertJson([
                'data' => [
                    'attributes' => [
                        'friendship' => [
                            'data' => [
                                'friend_request_id' => $friendRequest->id,
                                'attributes' => [
                                    'confirmed_at' => '1 day ago'
                                ]
                            ]
                        ]
                    ]
                ]
            ]);
    }

    /**
     * @test
     */
    public function an_inverse_friendship_is_retrieved_when_fetching_the_profile()
    {
        $user = $this->user();
        $this->actingAs($user, 'api');
        $anotherUser = $this->user();

        $friendRequest = Friend::create([
            'friend_id' => $user->id,
            'user_id' => $anotherUser->id,
            'confirmed_at' => now()->subDay(),
            'status' => 1
        ]);

        $this->get('/api/users/' . $anotherUser->id)
            ->assertStatus(200)
            ->assertJson([
                'data' => [
                    'attributes' => [
                        'friendship' => [
                            'data' => [
                                'friend_request_id' => $friendRequest->id,
                                'attributes' => [
                                    'confirmed_at' => '1 day ago'
                                ]
                            ]
                        ]
                    ]
                ]
            ]);
    }

    /**
     * @test
     */
    public function friend_requests_can_be_ignored()
    {
        $this->withoutExceptionHandling();

        $user = $this->user();
        $this->actingAs($user, 'api');

        $anotherUser = $this->user();

        $this->post('/api/friend-request', [
            'friend_id' => $anotherUser->id
        ])->assertStatus(200);

        $response = $this->actingAs($anotherUser, 'api')
            ->delete('/api/friend-request-response/delete', [
                'user_id' => $user->id,
            ])->assertStatus(204);

        $friendRequest = Friend::first();

        $this->assertNull($friendRequest);

        $response->assertNoContent();
    }

    /**
     * @test
     */
    public function only_the_recipient_can_ignore_a_friend_request()
    {
        $user = $this->user();
        $this->actingAs($user, 'api');

        $anotherUser = $this->user();

        $this->post('/api/friend-request', [
            'friend_id' => $anotherUser->id
        ])->assertStatus(200);

        $differentUser = $this->user();

        $response = $this->actingAs($differentUser, 'api')
            ->delete('/api/friend-request-response/delete', [
                'user_id' => $user->id,
            ])->assertStatus(404);

        $friendRequest = Friend::first();

        $this->assertNull($friendRequest->confirmed_at);
        $this->assertEquals(0, $friendRequest->status);

        $response->assertJson([
            'errors' => [
                'code' => 404,
                'title' => 'Record Not Found',
                'detail' => 'Unable to locate the record with the given information'
            ]
        ]);
    }

    /**
     * @test
     */
    public function user_id_is_required_for_ignoring_a_friend_request_responses()
    {
        $user = $this->user();

        $response = $this->actingAs($user, 'api')
            ->delete('/api/friend-request-response/delete', [
                'user_id' => ''
            ])->assertStatus(422);

        $responseString = json_decode($response->getContent(), true);

        $this->assertArrayHasKey('user_id', $responseString['errors']['meta']);

    }
}
