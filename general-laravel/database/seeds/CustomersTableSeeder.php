<?php

use Illuminate\Database\Seeder;

class CustomersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('customers')->delete();
        
        \DB::table('customers')->insert(array (
            0 => 
            array (
                'id' => 1,
                'user_id' => 7,
                'name' => 'Sheila Davis',
                'contacted_at' => NULL,
                'active' => 0,
                'created_at' => '2020-04-01 08:40:08',
                'updated_at' => '2020-04-01 08:40:08',
            ),
            1 => 
            array (
                'id' => 2,
                'user_id' => 8,
                'name' => 'Mckayla Gottlieb Jr.',
                'contacted_at' => NULL,
                'active' => 0,
                'created_at' => '2020-04-01 08:40:08',
                'updated_at' => '2020-04-01 08:40:08',
            ),
            2 => 
            array (
                'id' => 3,
                'user_id' => 9,
                'name' => 'Ottis Toy',
                'contacted_at' => NULL,
                'active' => 1,
                'created_at' => '2020-04-01 08:40:08',
                'updated_at' => '2020-04-01 08:40:08',
            ),
            3 => 
            array (
                'id' => 4,
                'user_id' => 10,
                'name' => 'Prof. Anabelle Cartwright',
                'contacted_at' => NULL,
                'active' => 1,
                'created_at' => '2020-04-01 08:40:08',
                'updated_at' => '2020-04-01 08:40:08',
            ),
            4 => 
            array (
                'id' => 5,
                'user_id' => 11,
                'name' => 'Burdette Ebert',
                'contacted_at' => NULL,
                'active' => 1,
                'created_at' => '2020-04-01 08:40:08',
                'updated_at' => '2020-04-01 08:40:08',
            ),
            5 => 
            array (
                'id' => 6,
                'user_id' => 12,
                'name' => 'Mr. George Bauch',
                'contacted_at' => NULL,
                'active' => 0,
                'created_at' => '2020-04-01 08:40:08',
                'updated_at' => '2020-04-01 08:40:08',
            ),
            6 => 
            array (
                'id' => 7,
                'user_id' => 13,
                'name' => 'Ms. Alexane Nicolas V',
                'contacted_at' => NULL,
                'active' => 0,
                'created_at' => '2020-04-01 08:40:08',
                'updated_at' => '2020-04-01 08:40:08',
            ),
            7 => 
            array (
                'id' => 8,
                'user_id' => 14,
                'name' => 'Ward Runolfsdottir',
                'contacted_at' => NULL,
                'active' => 1,
                'created_at' => '2020-04-01 08:40:08',
                'updated_at' => '2020-04-01 08:40:08',
            ),
            8 => 
            array (
                'id' => 9,
                'user_id' => 15,
                'name' => 'Delores Kuphal',
                'contacted_at' => NULL,
                'active' => 1,
                'created_at' => '2020-04-01 08:40:08',
                'updated_at' => '2020-04-01 08:40:08',
            ),
            9 => 
            array (
                'id' => 10,
                'user_id' => 16,
                'name' => 'Josephine Keebler',
                'contacted_at' => NULL,
                'active' => 1,
                'created_at' => '2020-04-01 08:40:08',
                'updated_at' => '2020-04-01 08:40:08',
            ),
        ));
        
        
    }
}