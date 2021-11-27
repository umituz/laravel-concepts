<?php

namespace Tests\Feature;

use App\Http\Traits\TestTrait;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

/**
 * Class GetAuthUserTest
 * @package Tests\Feature
 */
class GetAuthUserTest extends TestCase
{
    use RefreshDatabase, TestTrait;

    /**
     * @test
     */
    public function authenticated_user_can_be_fetched()
    {
        $this->withoutExceptionHandling();

        $user = $this->user();

        $this->actingAs($user, 'api');

        $response = $this->get('/api/auth-user');

        $response->assertStatus(200)
            ->assertJson([
                'data' => [
                    'type' => 'users',
                    'user_id' => $user->id,
                    'attributes' => [
                        'name' => $user->name,
                    ]
                ],
                'links' => []
            ]);
    }
}
