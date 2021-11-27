<?php

namespace Tests\Browser\Pages\Category;

use Laravel\Dusk\Browser;
use Tests\Browser\Pages\Page;

/**
 * Class CategoryEdit
 * @package Tests\Browser\Pages\Category
 */
class CategoryEdit extends Page
{
    protected $category_id;

    public function __construct($category_id)
    {
        $this->category_id = $category_id;
    }

    /**
     * Get the URL for the page.
     *
     * @return string
     */
    public function url()
    {
        return '/admin/categories/' . $this->category_id . '/edit';
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

    public function fillAndSubmitForm(Browser $browser)
    {
        $browser->append('name', ' Edited')
            ->press('Save');
    }
}
