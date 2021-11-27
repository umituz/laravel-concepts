<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'user_name' => 'umituz',
            'first_name' => 'Ümit',
            'last_name' => 'UZ',
            'email' => 'umituz998@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('123456'),
            'api_token' => Str::random(60),
            'remember_token' => Str::random(10),
        ]);

        factory(User::class, 10)->create();
    }
}
