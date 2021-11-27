<?php

namespace Tests\Feature;

use App\Models\Club;
use App\Repositories\ClubRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class ClubFeatureTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * A basic feature test example.
     *
     * @test
     * @return void
     */
    public function it_should_be_listed_all_clubs()
    {
        $clubs = (new ClubRepository(new Club()))->createClubsWithFactory();
        $response = $this->get('/api/clubs');
        $response->assertOk();
        $clubs->each(function ($club) use ($response) {
            $response->assertJsonFragment(['name' => $club->name]);
        });
    }
}
