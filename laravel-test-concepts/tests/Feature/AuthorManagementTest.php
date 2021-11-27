<?php

namespace Tests\Feature;

use App\Author;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * Class AuthorManagementTest
 * @package Tests\Feature
 */
class AuthorManagementTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function a_author_can_be_created()
    {
//        $this->withoutExceptionHandling();
        $this->post('authors', $this->data());

        $author = Author::all();

        $this->assertCount(1, $author);

        $this->assertInstanceOf(Carbon::class, $author->first()->birthday);

        $this->assertEquals('1988/14/04', $author->first()->birthday->format('Y/d/m'));
    }

    /**
     * @test
     */
    public function a_name_is_required()
    {
        $response = $this->post('authors', array_merge($this->data(), ['name' => '']));

        $response->assertSessionHasErrors('name');
    }

    /**
     * @test
     */
    public function a_birthday_is_required()
    {
        $response = $this->post('authors', array_merge($this->data(), ['birthday' => '']));

        $response->assertSessionHasErrors('birthday');
    }

    /**
     * @return array
     */
    private function data()
    {
        return [
            'name' => 'Ümit UZ',
            'birthday' => '04/14/1988'
        ];
    }
}
