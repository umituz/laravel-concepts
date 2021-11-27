<?php

namespace Commander\Providers;

use Commander\Console\Commands\Make\ComposerMakeCommand;
use Commander\Console\Commands\Make\ContractMakeCommand;
use Commander\Console\Commands\Make\EnumerationMakeCommand;
use Commander\Console\Commands\Make\FacadeMakeCommand;
use Commander\Console\Commands\Make\HelperMakeCommand;
use Commander\Console\Commands\Make\RepositoryMakeCommand;
use Commander\Console\Commands\Make\ServiceMakeCommand;
use Illuminate\Support\ServiceProvider;
use Commander\Console\Commands\Fresh;
use Commander\Console\Commands\Seed;
use Commander\Console\Commands\Clean;
use Commander\Console\Commands\TableTruncate;

/**
 * Class CommanderServiceProvider
 * @package Commander\Providers
 */
class CommanderServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {

            $this->registerPublishing();

        }
    }

    /**
     * Registers all commands to the laravel application.
     */
    public function register()
    {
        $this->commands([
            Fresh::class,
            Clean::class,
            Seed::class,
            TableTruncate::class,
            ComposerMakeCommand::class,
            ContractMakeCommand::class,
            EnumerationMakeCommand::class,
            FacadeMakeCommand::class,
            HelperMakeCommand::class,
            RepositoryMakeCommand::class,
            ServiceMakeCommand::class
        ]);
    }

    protected function registerPublishing()
    {
        $this->publishes([
            __DIR__.'/../../config/commander.php' => config_path('commander.php')
        ],'commander-config');

//        $this->publishes([
//            __DIR__.'/Console/stubs/UmutServiceProvider.stub' => app_path('Providers/UmutServiceProvider.php')
//        ],'umut-provider');
    }
}