<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

/**
 * Class UsersTableSeeder
 * @package Database\Seeders
 */
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Mobillium Admin',
            'email' => 'admin@mobillium.com',
            'password' => bcrypt('mobillium'),
        ]);
        $user->assignRole('Admin');

        $user = User::create([
            'name' => 'Mobillium Writer',
            'email' => 'writer1@mobillium.com',
            'password' => bcrypt('mobillium'),
        ]);
        $user->assignRole('Writer');

        User::factory(10)->create();
    }
}
