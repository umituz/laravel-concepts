<?php

namespace Tests\Browser;

use Spatie\Crawler\Crawler;
use Tests\DuskTestCase;
use Tests\Observer;

/**
 * Class CrawlerBrowserTest
 * @package Tests\Browser
 */
class CrawlerBrowserTest extends DuskTestCase
{
    /**
     * @test
     * @return void
     */
    public function crawlers()
    {
        Crawler::create()
            ->ignoreRobots()
            ->setCrawlObserver(new Observer)
            ->startCrawling('https://www.sipay.com.tr');

        $this->assertTrue(true);
    }
}
