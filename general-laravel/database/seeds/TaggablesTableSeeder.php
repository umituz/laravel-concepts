<?php

use Illuminate\Database\Seeder;

class TaggablesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('taggables')->delete();
        
        \DB::table('taggables')->insert(array (
            0 => 
            array (
                'tag_id' => 4,
                'taggable_id' => 1,
                'taggable_type' => 'App\\Post',
            ),
            1 => 
            array (
                'tag_id' => 5,
                'taggable_id' => 1,
                'taggable_type' => 'App\\Post',
            ),
            2 => 
            array (
                'tag_id' => 6,
                'taggable_id' => 1,
                'taggable_type' => 'App\\Post',
            ),
            3 => 
            array (
                'tag_id' => 3,
                'taggable_id' => 1,
                'taggable_type' => 'App\\Post',
            ),
            4 => 
            array (
                'tag_id' => 7,
                'taggable_id' => 1,
                'taggable_type' => 'App\\Video',
            ),
            5 => 
            array (
                'tag_id' => 8,
                'taggable_id' => 1,
                'taggable_type' => 'App\\Video',
            ),
            6 => 
            array (
                'tag_id' => 9,
                'taggable_id' => 2,
                'taggable_type' => 'App\\Video',
            ),
            7 => 
            array (
                'tag_id' => 10,
                'taggable_id' => 2,
                'taggable_type' => 'App\\Video',
            ),
            8 => 
            array (
                'tag_id' => 11,
                'taggable_id' => 3,
                'taggable_type' => 'App\\Video',
            ),
            9 => 
            array (
                'tag_id' => 12,
                'taggable_id' => 3,
                'taggable_type' => 'App\\Video',
            ),
            10 => 
            array (
                'tag_id' => 1,
                'taggable_id' => 1,
                'taggable_type' => 'App\\Video',
            ),
        ));
        
        
    }
}