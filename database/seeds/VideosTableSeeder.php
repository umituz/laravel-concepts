<?php

use App\Video;
use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;

class VideosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Video::class, 3)->create()->each(function ($video) {

            Collection::times(2, function ($number) use ($video) {
                $video->comments()->create([
                    'body' => $number . '.comment for video-' . $video->id
                ]);

                $video->tags()->create([
                    'title' => $number . '.tag for video-' . $video->id
                ]);
            });

        });

        $video = Video::first();
        $video->tags()->attach(1);
    }
}
