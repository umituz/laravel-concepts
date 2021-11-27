<?php

namespace Tests\Browser;

use App\Crawler;
use Exception;
use Facebook\WebDriver\WebDriverBy;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

/**
 * Class CrawlerBrowserTest
 * @package Tests\Browser
 */
class CrawlerBrowserTest extends DuskTestCase
{
    /**
     * @var string
     */
    protected static string $domain = 'laravel.com';

    /**
     * @var string
     */
    protected static string $startUrl = 'https://laravel.com/';

    /**
     * Constructor of the class
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
    }

    /** @test */
    public function crawl_the_site()
    {
        $startingLink = Crawler::create([
            'url' => self::$startUrl,
            'isCrawled' => false,
        ]);

        $this->browse(function (Browser $browser) use ($startingLink) {
            $this->getLinks($browser, $startingLink);
        });
    }

    /**
     * @param Browser $browser
     * @param $currentUrl
     */
    protected function getLinks(Browser $browser, $currentUrl)
    {
        $this->processCurrentUrl($browser, $currentUrl);

        try {
            foreach (Crawler::where('isCrawled', false)->get() as $link) {
                $this->getLinks($browser, $link);
            }
        } catch (Exception $e) {

        }
    }

    /**
     * @param Browser $browser
     * @param $currentUrl
     */
    protected function processCurrentUrl(Browser $browser, $currentUrl)
    {
        /** Check if already crawled */
        if (Crawler::where('url', $currentUrl->url)->first()->isCrawled == true) {
            return;
        }

        /** Visit URL */
        $browser->visit($currentUrl->url);

        /** Get Links and Save to DB if Valid */
        $linkElements = $browser->driver->findElements(WebDriverBy::tagName('a'));
        foreach ($linkElements as $element) {
            $href = $element->getAttribute('href');
            $href = $this->trimUrl($href);
            if ($this->isValidUrl($href)) {
                Crawler::create([
                    'url' => $href,
                    'isCrawled' => false,
                ]);
            }
        }

        /** Update current url status to crawled */
        $currentUrl->isCrawled = true;
        $currentUrl->status = $this->getHttpStatus($currentUrl->url);
        $currentUrl->title = $browser->driver->getTitle();
        $currentUrl->save();
    }

    /**
     * Checks url is valid or not
     *
     * @param $url
     * @return bool
     */
    protected function isValidUrl($url): bool
    {
        $parsed_url = parse_url($url);
        if (isset($parsed_url['host'])) {
            if (strpos($parsed_url['host'], self::$domain) !== false && !Crawler::where('url', $url)->exists()) {
                return true;
            }
        }
        return false;
    }

    /**
     * Clears url with specific character
     *
     * @param $url
     * @return string
     */
    protected function trimUrl($url): string
    {
        $url = strtok($url, '#');
        return rtrim($url, "/");
    }

    /**
     * Returns http status code
     *
     * @param $url
     * @return int
     */
    protected function getHttpStatus($url): int
    {
        $headers = get_headers($url, 1);
        return intval(substr($headers[0], 9, 3));
    }
}
