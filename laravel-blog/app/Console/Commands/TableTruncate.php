<?php

namespace App\Console\Commands;

use App\Helpers\CacheHelper;
use App\Helpers\DatabaseHelper;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\InputArgument;

/**
 * Class TableTruncate
 * @package App\Console\Commands
 */
class TableTruncate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'table:truncate {name : The name of the table}';

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
     * @return mixed
     */
    public function handle()
    {
        try {
            DatabaseHelper::disableForeignKey();
            DB::table($this->argument('name'))->truncate();
            DatabaseHelper::enableForeignKey();
            CacheHelper::clearAllCache();
            $this->info(__('Successfully table truncated'));
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

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions(): array
    {
        return [];
    }
}
