<?php

namespace Commander\Console\Commands;

use Illuminate\Console\Command;

/**
 * Class Clean
 * @package Commander\Console\Commands
 */
class Clean extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'commander:clean';
    
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clean all cached stuffs';
    
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
        $this->call('view:clear');
        $this->call('cache:clear');
        $this->call('config:clear');
        $this->call('route:clear');
        $this->call('clear-compiled');
        
        $this->call('optimize');
        
        $this->info('Files cached successfully!');
    }
}
