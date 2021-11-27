<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

/**
 * Class AppController
 * @package App\Http\Controllers\Api
 */
class AppController extends Controller
{
    /**
     * Url satırına ne yazılırsa yazılsın her zaman app blade dosyasını açar
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('app');
    }
}
