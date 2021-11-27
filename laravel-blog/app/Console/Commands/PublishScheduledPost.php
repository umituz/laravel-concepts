<?php

namespace App\Console\Commands;

use App\Enumerations\StatusEnumeration;
use App\Models\Post;
use Illuminate\Console\Command;

/**
 * Class PublishScheduledPost
 * @package App\Console\Commands
 */
class PublishScheduledPost extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'publish-post';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Publish posts';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $posts = Post::skipCache()->scheduled()->get();
        foreach ($posts as $post) {
            if ($post->published_at->lessThanOrEqualTo(now())) {
                $post->published_at = now();
                $post->status = StatusEnumeration::PUBLISHED;
                $post->save();
                $this->info("{$post->title} " . __('Published Now'));
            }
        }
    }
}
