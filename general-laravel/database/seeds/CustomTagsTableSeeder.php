<?php

use App\Tag;
use Illuminate\Database\Seeder;

class CustomTagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Tag::class, 3)->create();
    }
}
