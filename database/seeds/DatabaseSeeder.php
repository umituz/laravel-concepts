<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

/**
 * Class DatabaseSeeder
 */
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        $this->call(ChannelsTableSeeder::class);
        $this->call(CommentsTableSeeder::class);
        $this->call(CustomersTableSeeder::class);
        $this->call(FailedJobsTableSeeder::class);
        $this->call(ImagesTableSeeder::class);
        $this->call(PersonalAccessTokensTableSeeder::class);
        $this->call(PostContentsTableSeeder::class);
        $this->call(PostsTableSeeder::class);
        $this->call(TaggablesTableSeeder::class);
        $this->call(TagsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(VideosTableSeeder::class);
        $this->call(TestsTableSeeder::class);
        $this->call(TestContentsTableSeeder::class);

        Schema::enableForeignKeyConstraints();
    }
}
