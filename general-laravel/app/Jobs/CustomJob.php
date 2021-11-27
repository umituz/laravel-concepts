<?php

namespace App\Jobs;

use App\Mail\SendEmailMailable;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

/**
 * Class CustomJob
 * @package App\Jobs
 */
class CustomJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $jobData;


    /**
     * Create a new job instance.
     *
     * @param $jobData
     */
    public function __construct($jobData)
    {
        $this->jobData = $jobData;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $configServerId = config('queue.connections.database.server_id');

        $payload = json_decode($this->job->getRawBody());

        $data = unserialize($payload->data->command);

        $jobServerId = $data->jobData['server_id'];

        if ($configServerId == $jobServerId) {
            Mail::to('umituz9999@gmail.com')->send(new SendEmailMailable());
        }

    }
}
