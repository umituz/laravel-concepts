<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FixturesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        //        Fixture::factory()->count(1)->create();

        \DB::table('fixtures')->delete();

        \DB::table('fixtures')->insert(array (
            0 =>
            array (
                'home_club_id' => 1,
                'away_club_id' => 4,
                'week' => 1,
                'home_club_goal' => 0,
                'away_club_goal' => 0,
                'result' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2021-09-13 14:57:34',
                'updated_at' => '2021-09-13 14:57:34',
            ),
            1 =>
            array (
                'home_club_id' => 2,
                'away_club_id' => 3,
                'week' => 1,
                'home_club_goal' => 0,
                'away_club_goal' => 0,
                'result' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2021-09-13 14:57:34',
                'updated_at' => '2021-09-13 14:57:34',
            ),
            2 =>
            array (
                'home_club_id' => 2,
                'away_club_id' => 1,
                'week' => 2,
                'home_club_goal' => 0,
                'away_club_goal' => 0,
                'result' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2021-09-13 14:57:34',
                'updated_at' => '2021-09-13 14:57:34',
            ),
            3 =>
            array (
                'home_club_id' => 4,
                'away_club_id' => 3,
                'week' => 2,
                'home_club_goal' => 0,
                'away_club_goal' => 0,
                'result' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2021-09-13 14:57:34',
                'updated_at' => '2021-09-13 14:57:34',
            ),
            4 =>
            array (
                'home_club_id' => 2,
                'away_club_id' => 4,
                'week' => 3,
                'home_club_goal' => 0,
                'away_club_goal' => 0,
                'result' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2021-09-13 14:57:34',
                'updated_at' => '2021-09-13 14:57:34',
            ),
            5 =>
            array (
                'home_club_id' => 3,
                'away_club_id' => 1,
                'week' => 3,
                'home_club_goal' => 0,
                'away_club_goal' => 0,
                'result' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2021-09-13 14:57:34',
                'updated_at' => '2021-09-13 14:57:34',
            ),
            6 =>
            array (
                'home_club_id' => 4,
                'away_club_id' => 1,
                'week' => 4,
                'home_club_goal' => 0,
                'away_club_goal' => 0,
                'result' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2021-09-13 14:57:34',
                'updated_at' => '2021-09-13 14:57:34',
            ),
            7 =>
            array (
                'home_club_id' => 3,
                'away_club_id' => 2,
                'week' => 4,
                'home_club_goal' => 0,
                'away_club_goal' => 0,
                'result' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2021-09-13 14:57:34',
                'updated_at' => '2021-09-13 14:57:34',
            ),
            8 =>
            array (
                'home_club_id' => 1,
                'away_club_id' => 2,
                'week' => 5,
                'home_club_goal' => 0,
                'away_club_goal' => 0,
                'result' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2021-09-13 14:57:34',
                'updated_at' => '2021-09-13 14:57:34',
            ),
            9 =>
            array (
                'home_club_id' => 3,
                'away_club_id' => 4,
                'week' => 5,
                'home_club_goal' => 0,
                'away_club_goal' => 0,
                'result' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2021-09-13 14:57:34',
                'updated_at' => '2021-09-13 14:57:34',
            ),
            10 =>
            array (
                'home_club_id' => 4,
                'away_club_id' => 2,
                'week' => 6,
                'home_club_goal' => 0,
                'away_club_goal' => 0,
                'result' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2021-09-13 14:57:34',
                'updated_at' => '2021-09-13 14:57:34',
            ),
            11 =>
            array (
                'home_club_id' => 1,
                'away_club_id' => 3,
                'week' => 6,
                'home_club_goal' => 0,
                'away_club_goal' => 0,
                'result' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2021-09-13 14:57:34',
                'updated_at' => '2021-09-13 14:57:34',
            ),
        ));


    }
}
