<?php

use App\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;

class CustomPostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Post::class, 1)->create()->each(function ($post) {

            $post->image()->create([
                'url' => 'images/posts/post-' . $post->id . '.png'
            ]);

            Collection::times(3, function ($number) use ($post) {
                $post->comments()->create([
                    'body' => $number . '.comment for post-' . $post->id
                ]);
                $post->tags()->create([
                    'title' => $number . '.tag for post-' . $post->id
                ]);
            });

        });

        $post = Post::first();

        $post->tags()->attach(3);

    }
}
