<?php

namespace App\Http\Controllers;

use App\Facades\Test;

/**
 * Class TestController
 * @package App\Http\Controllers
 */
class TestController extends Controller
{
    public function facade()
    {
        Test::test();
    }
}
