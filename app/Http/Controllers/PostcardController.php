<?php

namespace App\Http\Controllers;

use App\Facades\Postcard;
use App\Services\PostcardSendingService;

/**
 * Class PostcardController
 * @package App\Http\Controllers
 */
class PostcardController extends Controller
{
    public function normal()
    {
        $postcardService = new PostcardSendingService('turkey', 4, 6);

        $postcardService->hello('Hello from Ümit UZ','test@test.com');
    }

    public function facade()
    {
        Postcard::hello('merhaba','test@test.com');
    }
}
