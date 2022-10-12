<?php

namespace App\Providers;

use App\Repositories\CustomerRepository;
use App\Repositories\CustomerRepositoryInterface;
use App\Repositories\UserRepository;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Support\ServiceProvider;

/**
 * Class RepositoriesServiceProvider
 * @package App\Providers
 */
class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->singleton(CustomerRepositoryInterface::class, CustomerRepository::class);
    }
}
