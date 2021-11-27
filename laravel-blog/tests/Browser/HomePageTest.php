<?php

namespace Tests\Browser;

use App\Helpers\ConfigHelper;
use App\Models\Post;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

/**
 * Class HomePageTest
 * @package Tests\Browser
 */
class HomePageTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * A Dusk test example.
     *
     * @test
     * @return void
     */
    public function seeHomepageDetails()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->assertSee(ConfigHelper::getAppName())
                ->assertSeeLink(__('Login'))
                ->assertSeeLink(__('Register'));
        });
    }

    /**
     * @test
     * @throws \Throwable
     */
    public function seeEachPublishedPostDetailsAtHomePage()
    {
        $posts = Post::factory()->published()->count(10)->create();
        $this->browse(function ($browser) use ($posts) {
            foreach ($posts as $post) {
                $browser->visit('/')
                    ->assertSee($post->title)
                    ->assertSee($post->introduction);
            }
        });
    }

    /**
     * @test
     * @throws \Throwable
     */
    public function cantSeeDraftAndScheduledPostDetailsAtHomepage()
    {
        $drafts = Post::factory()->draft()->count(10)->create();
        $schedules = Post::factory()->scheduled()->count(10)->create();

        $this->browse(function ($browser) use ($drafts, $schedules) {
            foreach ($drafts as $draft) {
                $browser->visit('/')
                    ->assertDontSee($draft->title)
                    ->assertDontSee($draft->introduction);
            }
            foreach ($schedules as $schedule) {
                $browser->visit('/')
                    ->assertDontSee($schedule->title)
                    ->assertDontSee($schedule->introduction);
            }
        });
    }
}
