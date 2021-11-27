<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->insert(array (
            0 =>
                array (
                    'id' => 1,
                    'name' => 'Ümit UZ',
                    'email' => 'umituz998@gmail.com',
                    'email_verified_at' => NULL,
                    'password' => bcrypt(123456789),
                    'remember_token' => NULL,
                    'created_at' => '2020-04-01 08:40:08',
                    'updated_at' => '2020-04-01 08:40:08',
                ),
        ));
    }
}
