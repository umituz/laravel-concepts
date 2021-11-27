<?php

namespace App\Console\Commands;

use App\Enumerations\SeederEnumeration;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

/**
 * Class Fresh
 * @package App\Console\Commands
 */
class Fresh extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fresh';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fresh and seed all tables in the database';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        if (config('app.env') == SeederEnumeration::LOCAL) {
            Artisan::call('migrate:fresh --seed --force');
            $this->info(Artisan::output());
            Artisan::call('passport:install --force');
            $this->info(Artisan::output());
        }
        return 0;
    }
}
