<?php

namespace Commander\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

/**
 * Class Fresh
 * @package Commander\Console\Commands
 */
class Fresh extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'commander:fresh';
    
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
     * @return mixed
     */
    public function handle()
    {
	    Artisan::call('migrate:fresh --seed --force');
	    
	    $this->info(Artisan::output());
	    
        $this->info('Successfully fresh and seed whole tables in the database');
    }
}
