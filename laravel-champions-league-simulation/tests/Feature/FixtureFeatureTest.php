<?php

namespace Tests\Feature;

use App\Enumerations\ClubEnumeration;
use App\Models\Fixture;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class FixtureFeatureTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * @test
     */
    public function it_should_be_list_all_fixtures()
    {
        $fixtures = Fixture::factory()->count(ClubEnumeration::TOTAL_CLUB)->create();
        $response = $this->get('/api/fixtures');

        $response->assertOk();

        $fixtures->each(function ($fixture) use ($response) {
            $response->assertJsonFragment(['home_club_id' => $fixture->home_club_id]);
        });
    }
}
