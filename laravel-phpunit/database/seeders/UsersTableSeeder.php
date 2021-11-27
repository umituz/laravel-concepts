<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('users')->delete();

        \DB::table('users')->insert(array (
            array (
                'name' => 'Ümit Kenan UZ',
                'email' => 'umit.kenan.uz@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$6VC3NpjPAmAN6Ba2Xg131utYj3nHOvTz.3s1h5Mc/P8cEzQb54Z76',
                'remember_token' => NULL,
                'created_at' => '2021-09-18 12:34:57',
                'updated_at' => '2021-09-18 12:34:57',
            ),
        ));


    }
}
