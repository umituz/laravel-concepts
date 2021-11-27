<?php

namespace LaravelHelper\Helpers;

use Illuminate\Support\Facades\DB;

/**
 * Class DatabaseHelper
 * @package LaravelHelper\Helpers
 */
class DatabaseHelper
{
    /**
     * Get all tables in the database
     *
     * @return string
     */
    public static function getAllTables()
    {
        $query = DB::select('SHOW TABLES WHERE Tables_in_' . ConfigHelper::getDatabaseName() . ' NOT LIKE "migrations"');
        $collection = collect($query);
        $tables = $collection->implode('Tables_in_' . ConfigHelper::getDatabaseName(), ',');
        return $tables;
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
     * Returns the allowed tables in the database
     *
     * @return array
     */
    public static function getAllowedTables()
    {
        $tablesArray = explode(',', (string)self::getAllTables());
        return array_merge(array_diff($tablesArray, self::getNotAllowedTables()));
    }

    /**
     * Disable foreign key
     */
    public static function disableForeignKey()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
    }

    /**
     * Enables foreign key
     */
    public static function enableForeignKey()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
