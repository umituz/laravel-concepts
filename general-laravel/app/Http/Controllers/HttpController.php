<?php

namespace App\Http\Controllers;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

/**
 * Class HttpController
 * @package App\Http\Controllers
 */
class HttpController extends Controller
{
    /**
     * @return Response
     */
    public function get()
    {
        return Http::get('https://jsonplaceholder.typicode.com/todos/1');
    }

    public function post()
    {
        $response = Http::post('https://jsonplaceholder.typicode.com/posts', [
            'user_id' => 123
        ]);
        dd($response->offsetGet('user_id'));

    }
}
