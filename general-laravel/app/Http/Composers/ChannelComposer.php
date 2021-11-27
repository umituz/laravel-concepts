<?php

namespace App\Http\Composers;

use App\Channel;
use Illuminate\View\View;

/**
 * Class ChannelComposer
 * @package App\Http\Composers
 */
class ChannelComposer
{
    public function compose(View $view)
    {
        $view->with('channels', $channels = Channel::orderBy('name')->get());
    }
}
