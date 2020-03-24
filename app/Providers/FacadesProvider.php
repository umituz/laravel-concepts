<?php

namespace App\Providers;

use App\Services\PostcardSendingService;
use App\Services\TestService;
use Illuminate\Support\ServiceProvider;

class FacadesProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //        $this->app->singleton(PostcardSendingService::class, function () {
//            return new PostcardSendingService('turkey', 4, 6);
//        });
//
        $this->app->singleton('Postcard', function () {
            return new PostcardSendingService('turkey', 4, 6);
        });

        $this->app->singleton('Test', function () {

            return new TestService();

        });
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
