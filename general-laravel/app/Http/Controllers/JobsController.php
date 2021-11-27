<?php

namespace App\Http\Controllers;

use App\Jobs\CustomJob;
use App\Jobs\SendEmailJob;
use Carbon\Carbon;
use Illuminate\Support\Facades\Queue;

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

    /**
     * @return string
     */
    public function customJob()
    {
        $job = new CustomJob(['server_id' => 1]);

        Queue::push($job);

        return "OKAY";
    }
}
