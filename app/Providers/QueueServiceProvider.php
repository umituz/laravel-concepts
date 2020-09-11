<?php

namespace App\Providers;

use App\Connectors\CustomDatabaseConnector;
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
}
