<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmailJob;

/**
 * Class JobsController
 * @package App\Http\Controllers
 */
class JobsController extends Controller
{
    public function index()
    {
        dispatch(new SendEmailJob());
        return "OK";
    }
}
