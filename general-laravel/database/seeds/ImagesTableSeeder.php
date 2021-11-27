<?php

use Illuminate\Database\Seeder;

class ImagesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('images')->delete();
        
        \DB::table('images')->insert(array (
            0 => 
            array (
                'id' => 1,
                'url' => 'images/users/user-2.jpg',
                'imageable_id' => 2,
                'imageable_type' => 'App\\User',
                'created_at' => '2020-04-01 08:40:08',
                'updated_at' => '2020-04-01 08:40:08',
            ),
            1 => 
            array (
                'id' => 2,
                'url' => 'images/users/user-3.jpg',
                'imageable_id' => 3,
                'imageable_type' => 'App\\User',
                'created_at' => '2020-04-01 08:40:08',
                'updated_at' => '2020-04-01 08:40:08',
            ),
            2 => 
            array (
                'id' => 3,
                'url' => 'images/users/user-4.jpg',
                'imageable_id' => 4,
                'imageable_type' => 'App\\User',
                'created_at' => '2020-04-01 08:40:08',
                'updated_at' => '2020-04-01 08:40:08',
            ),
            3 => 
            array (
                'id' => 4,
                'url' => 'images/users/user-5.jpg',
                'imageable_id' => 5,
                'imageable_type' => 'App\\User',
                'created_at' => '2020-04-01 08:40:08',
                'updated_at' => '2020-04-01 08:40:08',
            ),
            4 => 
            array (
                'id' => 5,
                'url' => 'images/users/user-6.jpg',
                'imageable_id' => 6,
                'imageable_type' => 'App\\User',
                'created_at' => '2020-04-01 08:40:08',
                'updated_at' => '2020-04-01 08:40:08',
            ),
            5 => 
            array (
                'id' => 6,
                'url' => 'images/posts/post-1.png',
                'imageable_id' => 1,
                'imageable_type' => 'App\\Post',
                'created_at' => '2020-04-01 08:40:08',
                'updated_at' => '2020-04-01 08:40:08',
            ),
        ));
        
        
    }
}