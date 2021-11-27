<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\Vote;
use Illuminate\Database\Seeder;

/**
 * Class VotesTableSeeder
 * @package Database\Seeders
 */
class VotesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 10; $i++) {
            $user = User::find($i);
            $post = Post::find($i);
            Vote::factory()
                ->for($user)
                ->for($post)
                ->create();
        }
    }
}
