<?php

namespace Tests\Browser\Pages\City;

use Laravel\Dusk\Browser;
use Tests\Browser\Pages\Page;

/**
 * Class CityEdit
 * @package Tests\Browser\Pages\City
 */
class CityEdit extends Page
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
        return '/admin/cities/' . $this->cityId . '/edit';
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
            ->assertSee('Edit City');
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
     */
    public function fillAndSubmitForm(Browser $browser)
    {
        $browser
            ->append('name', ' Edited')
            ->press('Save');
    }
}
