<?php

namespace App\Http\Controllers;

use App\Channel;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * Class ChannelController
 * @package App\Http\Controllers
 */
class ChannelController extends Controller
{
    /**
     * @return Factory|View
     */
    public function index()
    {
        return view('channel.index');
    }
}
