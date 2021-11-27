<?php

use Illuminate\Database\Seeder;

/**
 * Class FriendSeeder
 */
class FriendSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        DB::table('friends')->truncate();

        DB::table('friends')->insert([
            ['user_id' => 1, 'friend_id' => 2,'status' => 1,'confirmed_at' => now(),'created_at' => now(),'updated_at' => now()],
        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
