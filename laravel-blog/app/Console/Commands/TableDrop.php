<?php

namespace App\Console\Commands;

use App\Helpers\CacheHelper;
use App\Helpers\DatabaseHelper;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Schema;
use Symfony\Component\Console\Input\InputArgument;

/**
 * Class TableDrop
 * @package App\Console\Commands
 */
class TableDrop extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'table:drop {name : The name of the table}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Truncates the specific table in the database';

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
        try {
            DatabaseHelper::disableForeignKey();
            Schema::dropIfExists($this->argument('name'));
            DatabaseHelper::disableForeignKey();
            CacheHelper::clearAllCache();
            $this->info(__('Successfully table dropped'));
        } catch (\Exception $e) {
            $this->info($e->getMessage());
        }
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments(): array
    {
        return [
            array('table', InputArgument::REQUIRED, 'table name'),
        ];
    }
}
