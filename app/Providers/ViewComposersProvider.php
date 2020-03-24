<?php

namespace App\Providers;

use App\Http\Composers\ChannelComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewComposersProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //        View::composer(['post.*', 'channel.index'], function ($view) {
//            $view->with('channels', $channels = Channel::orderBy('name')->get());
//        });

        View::composer('includes.composers.channels.*', ChannelComposer::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
