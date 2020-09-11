<?php

namespace App\Customizations;

use Illuminate\Queue\Worker;
use Illuminate\Queue\WorkerOptions;

/**
 * Class CustomWorker
 * @package App\Customizations
 */
class CustomWorker extends Worker
{
    /**
     * Listen to the given queue in a loop.
     *
     * @param string $connectionName
     * @param string $queue
     * @param \Illuminate\Queue\WorkerOptions $options
     * @return void
     */
    public function daemon($connectionName, $queue, WorkerOptions $options)
    {
        if ($this->supportsAsyncSignals()) {
            $this->listenForSignals();
        }

        $lastRestart = $this->getTimestampOfLastQueueRestart();

        while (true) {
            // Before reserving any jobs, we will make sure this queue is not paused and
            // if it is we will just pause this worker for a given amount of time and
            // make sure we do not need to kill this worker process off completely.
//            if (!$this->daemonShouldRun($options, $connectionName, $queue)) {
//                $this->pauseWorker($options, $lastRestart);
//
//                continue;
//            }

            // First, we will attempt to get the next job off of the queue. We will also
            // register the timeout handler and reset the alarm for this job so it is
            // not stuck in a frozen state forever. Then, we can fire off this job.
            $job = $this->getNextJob(
                $this->manager->connection($connectionName), $queue
            );

            if (is_null($job)) {
                continue;
            }

            $jobServerId = $job->getServerId();
            $serverId = config('queue.connections.database.server_id');

            if ($serverId !== $jobServerId) {
                continue;
            }

            if ($this->supportsAsyncSignals()) {
                $this->registerTimeoutHandler($job, $options);
            }

            // If the daemon should run (not in maintenance mode, etc.), then we can run
            // fire off this job for processing. Otherwise, we will need to sleep the
            // worker so no more jobs are processed until they should be processed.

            if ($job) {
                $this->runJob($job, $connectionName, $options);
            } else {
                $this->sleep($options->sleep);
            }

            if ($this->supportsAsyncSignals()) {
                $this->resetTimeoutHandler();
            }

            // Finally, we will check to see if we have exceeded our memory limits or if
            // the queue should restart based on other indications. If so, we'll stop
            // this worker and let whatever is "monitoring" it restart the process.
            $this->stopIfNecessary($options, $lastRestart, $job);
        }
    }
}
