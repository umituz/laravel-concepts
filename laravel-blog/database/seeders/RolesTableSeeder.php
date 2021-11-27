<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

/**
 * Class RolesTableSeeder
 * @package Database\Seeders
 */
class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::insert([
            ['name' => 'Admin'],
            ['name' => 'Moderator'],
            ['name' => 'Writer'],
            ['name' => 'Reader']
        ]);
    }
}
