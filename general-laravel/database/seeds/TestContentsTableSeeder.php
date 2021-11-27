<?php

use Illuminate\Database\Seeder;

class TestContentsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('test_contents')->delete();
        
        \DB::table('test_contents')->insert(array (
            0 => 
            array (
                'id' => 1,
                'language_id' => 1,
                'test_id' => 1,
                'title' => 'TÜRKÇE TEST',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'language_id' => 2,
                'test_id' => 1,
                'title' => 'ENGLISH TEST',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}