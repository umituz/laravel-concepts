<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmailJob;
use Carbon\Carbon;

/**
 * Class JobsController
 * @package App\Http\Controllers
 */
class JobsController extends Controller
{
    /**
     * @return string
     */
    public function index()
    {
        $job = (new SendEmailJob())->delay(Carbon::now()->addSeconds(5));
        dispatch($job);
        return "OK";
    }
}
