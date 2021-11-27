<?php

use Illuminate\Database\Seeder;

/**
 * Class UserAddressesTableSeeder
 */
class UserAddressesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\UserAddress::class,10)->create();
    }
}
