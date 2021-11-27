<?php

namespace Tests\Unit;

use App\Author;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

/**
 * Class AuthorTest
 * @package Tests\Unit
 */
class AuthorTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function only_name_is_required_to_create_an_author()
    {
        Author::firstOrCreate([
            'name' => 'Ümit UZ'
        ]);

        $this->assertCount(1, Author::all());
    }
}
