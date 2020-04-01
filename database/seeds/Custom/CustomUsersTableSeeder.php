<?php

use App\User;
use Illuminate\Database\Seeder;

class CustomUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Ümit UZ',
            'email' => 'umituz998@gmail.com',
            'password' => bcrypt(123456)
        ]);

        factory(User::class, 5)->create()->each(function ($user) {

            $user->image()->create([
                'url' => 'images/users/user-' . $user->id . '.jpg'
            ]);

        });
    }
}
