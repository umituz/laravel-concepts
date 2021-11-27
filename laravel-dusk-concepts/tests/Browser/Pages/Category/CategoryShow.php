<?php

namespace Tests\Browser\Pages\Category;

use Laravel\Dusk\Browser;
use Tests\Browser\Pages\Page;

/**
 * Class CategoryShow
 * @package Tests\Browser\Pages\Category
 */
class CategoryShow extends Page
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
        return '/admin/categories/' . $this->category_id;
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

    public function assertSeeCategoryDetails(Browser $browser, $category)
    {
        $browser->assertSee($category->id)
            ->assertSee($category->name)
            ->assertSee($category->icon);
    }
}
