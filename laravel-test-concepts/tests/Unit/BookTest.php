<?php

namespace Tests\Unit;

use App\Book;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * Class BookTest
 * @package Tests\Unit
 */
class BookTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function an_author_id_is_recorded()
    {
        Book::create([
            'title' => 'Test Title',
            'author_id' => 1
        ]);

        $this->assertCount(1, Book::all());
    }
}
