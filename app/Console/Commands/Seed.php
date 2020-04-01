<?php

namespace App\Console\Commands;

use App\Http\Helpers\DatabaseHelper;
use Illuminate\Config\Repository;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

/**
 * Class Seed
 * @package App\Console\Commands
 */
class Seed extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'seed';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Seed whole database';

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
        $this->info('Calling iseed for all tables except: ' . implode(', ', self::getNotAllowedTables()));

        $this->call('iseed', [
            'tables' => implode(',', self::getAllowedTables()),
            '--force' => 'force'
        ]);
    }

    /**
     * Returns the allowed tables in the database
     *
     * @return array
     */
    public static function getAllowedTables()
    {
        $tablesArray = explode(',', (string)self::getAllTables());
        $allowedTables = array_merge(array_diff($tablesArray, self::getNotAllowedTables()));
        return $allowedTables;
    }

    /**
     * Returns not allowed tables in the database
     *
     * @return array
     */
    public static function getNotAllowedTables()
    {
        return [
            'migrations',
            'telescope_entries',
            'telescope_entries_tags',
            'telescope_monitoring',
        ];
    }

    /**
     * Returns the database name
     *
     * @return Repository|mixed
     */
    public static function getDatabaseName()
    {
        return config('database.connections.mysql.database');
    }

    /**
     * Get all tables in the database
     *
     * @return string
     */
    public static function getAllTables()
    {
        $query = DB::select('SHOW TABLES WHERE Tables_in_' . self::getDatabaseName() . ' NOT LIKE "migrations"');
        $collection = collect($query);
        $tables = $collection->implode('Tables_in_' . self::getDatabaseName(), ',');
        return $tables;
    }
}
