<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

/**
 * Class PermissionsTableSeeder
 * @package Database\Seeders
 */
class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::firstOrCreate(['name' => 'posts.index']);
        Permission::firstOrCreate(['name' => 'posts.create']);
        Permission::firstOrCreate(['name' => 'posts.edit']);
        Permission::firstOrCreate(['name' => 'posts.destroy']);
        Permission::firstOrCreate(['name' => 'posts.publish']);
        Permission::firstOrCreate(['name' => 'posts.unpublish']);
        Permission::firstOrCreate(['name' => 'posts.export']);
    }
}
