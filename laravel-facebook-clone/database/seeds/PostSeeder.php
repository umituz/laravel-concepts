<?php

use Illuminate\Database\Seeder;

/**
 * Class PostSeeder
 */
class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        DB::table('posts')->truncate();

        DB::table('posts')->insert([
            ['user_id' => 1, 'body' => 'First very cool post', 'image' => null, 'created_at' => '2020-05-24 00:18:56', 'updated_at' => '2020-05-24 00:18:56'],
            ['user_id' => 1, 'body' => 'Second very cool post','image' => 'https://image.shutterstock.com/image-photo/colorful-hot-air-balloons-flying-260nw-1033306540.jpg', 'created_at' => '2020-05-24 02:18:56', 'updated_at' => '2020-05-24 02:18:56'],
            ['user_id' => 2, 'body' => 'Third very cool post','image' => 'https://image.shutterstock.com/image-photo/colorful-hot-air-balloons-flying-260nw-1033306540.jpg', 'created_at' => '2020-05-24 02:18:56', 'updated_at' => '2020-05-24 02:18:56'],
        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
