<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * Class UserSeeder
 */
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        DB::table('users')->truncate();

        DB::table('users')->insert([
            ['name' => 'Ümit UZ', 'email' => 'umituz998@gmail.com', 'password' => bcrypt('123456789')],
            ['name' => 'Umut UZ', 'email' => 'umutuz998@gmail.com', 'password' => bcrypt('123456789')]
        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
