<?php

namespace App\Customizations;

use Illuminate\Queue\Jobs\DatabaseJob;

/**
 * Class CustomDatabaseJob
 * @package App\Customizations
 */
class CustomDatabaseJob extends DatabaseJob
{
    /**
     * Get the job server identifier.
     *
     * @return string
     */
    public function getServerId()
    {
        return $this->job->server_id;
    }
}
