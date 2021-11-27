<?php

namespace Tests\Browser\Pages\City;

use Laravel\Dusk\Browser;
use Tests\Browser\Pages\Page;

/**
 * Class CityShow
 * @package Tests\Browser\Pages\City
 */
class CityShow extends Page
{
    protected $cityId;

    public function __construct($cityId)
    {
        $this->cityId = $cityId;
    }

    /**
     * Get the URL for the page.
     *
     * @return string
     */
    public function url()
    {
        return '/admin/cities/' . $this->cityId;
    }

    /**
     * Assert that the browser is on the page.
     *
     * @param Browser $browser
     * @return void
     */
    public function assert(Browser $browser)
    {
        $browser->assertPathIs($this->url());
    }

    /**
     * Get the element shortcuts for the page.
     *
     * @return array
     */
    public function elements()
    {
        return [
            '@element' => '#selector',
        ];
    }

    /**
     * @param Browser $browser
     * @param $city
     */
    public function assertSeeCityDetails(Browser $browser, $city)
    {
        $browser
            ->assertSee($city->id)
            ->assertSee($city->name);
    }
}
