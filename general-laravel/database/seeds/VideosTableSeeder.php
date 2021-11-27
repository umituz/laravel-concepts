<?php

use Illuminate\Database\Seeder;

class VideosTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('videos')->delete();
        
        \DB::table('videos')->insert(array (
            0 => 
            array (
                'id' => 1,
                'title' => 'in',
                'created_at' => '2020-04-01 08:40:08',
                'updated_at' => '2020-04-01 08:40:08',
            ),
            1 => 
            array (
                'id' => 2,
                'title' => 'aut',
                'created_at' => '2020-04-01 08:40:08',
                'updated_at' => '2020-04-01 08:40:08',
            ),
            2 => 
            array (
                'id' => 3,
                'title' => 'aut',
                'created_at' => '2020-04-01 08:40:08',
                'updated_at' => '2020-04-01 08:40:08',
            ),
        ));
        
        
    }
}