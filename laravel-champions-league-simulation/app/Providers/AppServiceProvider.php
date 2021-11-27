<?php

namespace App\Providers;

use App\Contracts\ClubRepositoryContract;
use App\Contracts\FixtureRepositoryContract;
use App\Repositories\ClubRepository;
use App\Repositories\FixtureRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(ClubRepositoryContract::class, ClubRepository::class);
        $this->app->bind(FixtureRepositoryContract::class, FixtureRepository::class);
    }
}
