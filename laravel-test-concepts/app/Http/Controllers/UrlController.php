<?php

namespace App\Http\Controllers;

use Performance\Performance;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;

/**
 * Class UrlController
 * @package App\Http\Controllers
 * @group URL Module
 */
class UrlController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function home()
    {
        /**

         * @get('//')
         * @name('')
         * @middlewares(web)
         */
        return view('welcome');
    }

    public function react()
    {
        return view('react');
    }

    /**
     * Analyze performance of the current page
     *
     * @return Application|Factory|View
     */
    public function analyzePerformance()
    {
        Performance::point();
        Performance::results();
        return view('welcome');
    }

    public function jenkins()
    {
        return 'Jenkins test part 1';
    }
}
