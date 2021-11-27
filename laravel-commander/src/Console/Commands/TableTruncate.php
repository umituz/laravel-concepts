<?php

namespace Commander\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\InputArgument;

/**
 * Class TableTruncate
 * @package Commander\Console\Commands
 */
class TableTruncate extends Command
{
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'commander:table-truncate {name : The name of the table}';
	
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
			DB::statement('SET FOREIGN_KEY_CHECKS = 0');
			DB::table($this->argument('table'))->truncate();
			DB::statement('SET FOREIGN_KEY_CHECKS = 1');
			$this->info("Successfully table truncated");
		} catch (\Exception $e) {
			$this->info($e->getMessage());
		}
		
	}
	
	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
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
	protected function getOptions()
	{
		return [];
	}
}