<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Http;
use Tests\TestCase;

/**
 * Class HttpRequestsTest
 * @package Tests\Feature
 */
class HttpRequestsTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        Http::fake([
//           'jsonplaceholder.*' => Http::response([
//               'user_id' => 123123
//           ],500,[
//               'X-HEADER' => 'TEST HEADER'
//           ]),
            'jsonplaceholder.*' => Http::sequence()
                ->push(['user_id' => 123])
                ->push(['user_id' => 321])
        ]);
    }

    public function testExample()
    {
//        $response = Http::post('https://jsonplaceholder.typicode.com/posts', [
//            'user_id' => 123
//        ]);
        $response = Http::post('https://jsonplaceholder.typicode.com/posts', [
            'user_id' => 123
        ]);
        $response = Http::post('https://jsonplaceholder.typicode.com/posts', [
            'user_id' => 321
        ]);

        Http::assertSent(function ($request) {
            return $request->url() == 'https://jsonplaceholder.typicode.com/posts';
        });

    }

    public function testJust()
    {
        $this->assertTrue(true);
    }
}
