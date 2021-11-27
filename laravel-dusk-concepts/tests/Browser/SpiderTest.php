<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

/**
 * Class CrawlerTest
 * @package Tests\Browser
 */
class SpiderTest extends DuskTestCase
{
    /**
     * @var string
     */
    protected static $domain = 'https://www.google.com';

    /**
     * @var mixed
     */
    protected $urls;

    protected function setUp(): void
    {
        parent::setUp();
        $this->urls = collect([
            [
                'url' => self::$domain,
                'crawled' => 0
            ]
        ]);
    }

    /**
     * @test
     * @throws \Throwable
     */
    public function crawl()
    {
        $this->browse(function (Browser $browser) {
            for ($i = 0; $this->urls->count() < 15; $i++) {
                if ($this->urls->get($i) != null) {
                    if ($this->urls->get($i)['crawled'] == 0) {
                        $this->processURL($browser, $this->urls->get($i)['url']);
                    }
                }
            }
        });
    }

    /**
     * @param $browser
     * @param $url
     */
    public function processUrl($browser, $url)
    {
        /** Visit the url */
        $browser->visit($url);

        /** Get all the links available on the page */
        $links = $browser->elements('a');

        /** Loop through all the links and add it to the collection */
        foreach ($links as $link) {
            /** @var string $href */
            $href = $link->getAttribute('href');

            /** @var string $internalLink */
            $internalLink = $this->trimURL($href);

            if ($this->isValidURL($internalLink) && !$this->urlIndexed($internalLink)) {
                $this->urls->push([
                    'url' => $internalLink,
                    'crawled' => 0
                ]);
            }
            /** Set title & mark current link crawled */
            $this->markCrawled($url);
        }
    }

    /**
     * Returns trimmed url
     *
     * @param $url
     * @return false|string
     */
    protected function trimURL($url)
    {
        $url = strtok($url, '?');
        $url = strtok($url, '#');
        return strtok($url, '/');
    }

    /**
     * Checks the url is valid
     *
     * @param $url
     * @return bool
     */
    protected function isValidURL($url): bool
    {
        $parsedUrl = parse_url($url);
        $parsedDomain = parse_url(self::$domain);
        if (isset($parsedUrl['host']) && $parsedUrl['host'] == $parsedDomain['host']) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Checks that url is indexed or not
     *
     * @param $url
     * @return bool
     */
    protected function urlIndexed($url): bool
    {
        return $this->urls->contains('url', $url);
    }

    /**
     * @param $url
     */
    protected function markCrawled($url)
    {
        $this->urls->transform(function ($item, $key) use ($url) {
            if ($item['url'] == $url) {
                $item['crawled'] = 1;
            }
            return $item;
        });
    }

}
