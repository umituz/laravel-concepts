<?php

use Illuminate\Database\Seeder;

class PostContentsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('post_contents')->delete();

        \DB::table('post_contents')->insert(array (
            0 =>
            array (
                'id' => 1,
                'language_id' => 'en',
                'post_id' => 1,
                'title' => 'EN TITLE',
                'content' => 'EN BODY',
                'active' => 1,
                'deleted_at' => NULL,
                'created_at' => '2020-04-01 00:00:00',
                'updated_at' => '2020-04-01 00:00:00',
            ),
            1 =>
            array (
                'id' => 2,
                'language_id' => 'tr',
                'post_id' => 1,
                'title' => 'TR BAŞLIK',
                'content' => 'TR AÇIKLAMA',
                'active' => 1,
                'deleted_at' => NULL,
                'created_at' => '2020-04-01 00:00:00',
                'updated_at' => '2020-04-01 00:00:00',
            ),
            2 =>
            array (
                'id' => 3,
                'language_id' => 'en',
                'post_id' => 2,
                'title' => 'EN SECOND TITLE',
                'content' => 'EN SECOND BODY',
                'active' => 1,
                'deleted_at' => NULL,
                'created_at' => '2020-04-01 00:00:00',
                'updated_at' => '2020-04-01 00:00:00',
            ),
            3 =>
            array (
                'id' => 4,
                'language_id' => 'tr',
                'post_id' => 2,
                'title' => 'TR İKİNCİ BAŞLIK',
                'content' => 'TR İKİNCİ AÇIKLAMA',
                'active' => 1,
                'deleted_at' => NULL,
                'created_at' => '2020-04-01 00:00:00',
                'updated_at' => '2020-04-01 00:00:00',
            ),
            4 =>
            array (
                'id' => 5,
                'language_id' => 'en',
                'post_id' => 3,
                'title' => 'EN THIRD TITLE',
                'content' => 'EN SECOND BODY',
                'active' => 1,
                'deleted_at' => NULL,
                'created_at' => '2020-04-01 00:00:00',
                'updated_at' => '2020-04-01 00:00:00',
            ),
            5 =>
            array (
                'id' => 6,
                'language_id' => 'tr',
                'post_id' => 3,
                'title' => 'TR ÜÇÜNCÜ BAŞLIK',
                'content' => 'TR ÜÇÜNCÜ AÇIKLAMA',
                'active' => 1,
                'deleted_at' => NULL,
                'created_at' => '2020-04-01 00:00:00',
                'updated_at' => '2020-04-01 00:00:00',
            ),
        ));


    }
}
