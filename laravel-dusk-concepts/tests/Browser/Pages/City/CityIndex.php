<?php

namespace Tests\Browser\Pages\City;

use Laravel\Dusk\Browser;
use Tests\Browser\Pages\Page;

/**
 * Class CityIndex
 * @package Tests\Browser\Pages\City
 */
class CityIndex extends Page
{
    /**
     * Get the URL for the page.
     *
     * @return string
     */
    public function url()
    {
        return '/admin/cities';
    }

    /**
     * Assert that the browser is on the page.
     *
     * @param Browser $browser
     * @return void
     */
    public function assert(Browser $browser)
    {
        $browser
            ->assertPathIs($this->url())
            ->assertSee('City List');
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
     * @param $cityName
     */
    public function assertSeeCity(Browser $browser, $cityName)
    {
        $browser->assertSee($cityName);
    }

    /**
     * @param Browser $browser
     * @param $cityName
     */
    public function assertDontSeeCity(Browser $browser, $cityName)
    {
        $browser->assertDontSee($cityName);
    }

    /**
     * @param Browser $browser
     * @param $cities
     */
    public function assertSeeCities(Browser $browser, $cities)
    {
        foreach ($cities as $city) {
            $browser->assertSee($city->name);
        }
    }

    /**
     * @param Browser $browser
     */
    public function pressAddCityButton(Browser $browser)
    {
        $browser->clickLink('Add City');
    }

    /**
     * @param Browser $browser
     * @param $cityId
     */
    public function pressViewButton(Browser $browser, $cityId)
    {
        $browser->click('@viewButton' . $cityId);
    }

    /**
     * @param Browser $browser
     * @param $cityId
     */
    public function pressEditButton(Browser $browser, $cityId)
    {
        $browser->click('@editButton' . $cityId);
    }

    /**
     * @param Browser $browser
     * @param $cityId
     */
    public function pressDeleteButton(Browser $browser, $cityId)
    {
        $browser->click('@deleteButton' . $cityId);
    }

    /**
     * @param Browser $browser
     */
    public function deleteCity(Browser $browser)
    {
        $browser->assertDialogOpened('Are you sure?')
            ->pause(500)
            ->acceptDialog()
            ->assertPathIs('/admin/cities');
    }
}
