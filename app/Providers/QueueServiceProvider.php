<?php

namespace App\Providers;

use App\Connectors\CustomDatabaseConnector;
use App\Customizations\CustomWorker;
use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Queue\QueueServiceProvider as BaseQueueServiceProvider;

/**
 * Class QueueServiceProvider
 * @package App\Providers
 */
class QueueServiceProvider extends BaseQueueServiceProvider
{
    /**
     * Register the database queue connector.
     *
     * @param  \Illuminate\Queue\QueueManager  $manager
     * @return void
     */
    protected function registerDatabaseConnector($manager)
    {
        $manager->addConnector('database', function () {
            return new CustomDatabaseConnector($this->app['db']);
        });
    }

    /**
     * Register the queue worker.
     *
     * @return void
     */
    protected function registerWorker()
    {
        $this->app->singleton('queue.worker', function ($app) {
            $isDownForMaintenance = function () {
                return $this->app->isDownForMaintenance();
            };

            return new CustomWorker(
                $app['queue'],
                $app['events'],
                $app[ExceptionHandler::class],
                $isDownForMaintenance
            );
        });
    }
}
