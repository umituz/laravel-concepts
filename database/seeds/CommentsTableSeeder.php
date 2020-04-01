<?php

use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('comments')->delete();
        
        \DB::table('comments')->insert(array (
            0 => 
            array (
                'id' => 1,
                'body' => '1.comment for post-1',
                'commentable_id' => 1,
                'commentable_type' => 'App\\Post',
                'created_at' => '2020-04-01 08:40:08',
                'updated_at' => '2020-04-01 08:40:08',
            ),
            1 => 
            array (
                'id' => 2,
                'body' => '2.comment for post-1',
                'commentable_id' => 1,
                'commentable_type' => 'App\\Post',
                'created_at' => '2020-04-01 08:40:08',
                'updated_at' => '2020-04-01 08:40:08',
            ),
            2 => 
            array (
                'id' => 3,
                'body' => '3.comment for post-1',
                'commentable_id' => 1,
                'commentable_type' => 'App\\Post',
                'created_at' => '2020-04-01 08:40:08',
                'updated_at' => '2020-04-01 08:40:08',
            ),
            3 => 
            array (
                'id' => 4,
                'body' => '1.comment for video-1',
                'commentable_id' => 1,
                'commentable_type' => 'App\\Video',
                'created_at' => '2020-04-01 08:40:08',
                'updated_at' => '2020-04-01 08:40:08',
            ),
            4 => 
            array (
                'id' => 5,
                'body' => '2.comment for video-1',
                'commentable_id' => 1,
                'commentable_type' => 'App\\Video',
                'created_at' => '2020-04-01 08:40:08',
                'updated_at' => '2020-04-01 08:40:08',
            ),
            5 => 
            array (
                'id' => 6,
                'body' => '1.comment for video-2',
                'commentable_id' => 2,
                'commentable_type' => 'App\\Video',
                'created_at' => '2020-04-01 08:40:08',
                'updated_at' => '2020-04-01 08:40:08',
            ),
            6 => 
            array (
                'id' => 7,
                'body' => '2.comment for video-2',
                'commentable_id' => 2,
                'commentable_type' => 'App\\Video',
                'created_at' => '2020-04-01 08:40:08',
                'updated_at' => '2020-04-01 08:40:08',
            ),
            7 => 
            array (
                'id' => 8,
                'body' => '1.comment for video-3',
                'commentable_id' => 3,
                'commentable_type' => 'App\\Video',
                'created_at' => '2020-04-01 08:40:08',
                'updated_at' => '2020-04-01 08:40:08',
            ),
            8 => 
            array (
                'id' => 9,
                'body' => '2.comment for video-3',
                'commentable_id' => 3,
                'commentable_type' => 'App\\Video',
                'created_at' => '2020-04-01 08:40:08',
                'updated_at' => '2020-04-01 08:40:08',
            ),
        ));
        
        
    }
}