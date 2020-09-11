<?php

namespace App\Connectors;

use App\Customizations\CustomDatabaseQueue;
use Illuminate\Queue\Connectors\DatabaseConnector;

/**
 * Class CustomDatabaseConnector
 * @package App\Connectors
 */
class CustomDatabaseConnector extends DatabaseConnector
{
    /**
     * Establish a queue connection.
     *
     * @param  array  $config
     * @return CustomDatabaseQueue
     */
    public function connect(array $config)
    {
        return new CustomDatabaseQueue(
            $this->connections->connection($config['connection'] ?? null),
            $config['table'],
            $config['queue'],
            $config['retry_after'] ?? 60
        );
    }
}
