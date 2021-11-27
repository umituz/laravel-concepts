<?php

namespace App\Http\Controllers;

use App\Crawler;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

/**
 * Class CrawlersController
 * @package App\Http\Controllers
 */
class CrawlersController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('crawlers.index')
            ->with('items', Crawler::orderBy('status', 'asc')->get());
    }
}
