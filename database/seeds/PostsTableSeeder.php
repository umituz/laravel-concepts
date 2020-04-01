<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('posts')->delete();

        \DB::table('posts')->insert(array (
            0 =>
            array (
                'id' => 1,
            ),
            1 =>
            array (
                'id' => 2,
            ),
            2 =>
            array (
                'id' => 3,
            ),
        ));


    }
}
