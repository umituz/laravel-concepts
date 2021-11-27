<?php

namespace Tests\Browser\Pages\Category;

use Laravel\Dusk\Browser;
use Tests\Browser\Pages\Page;

/**
 * Class CategoryIndex
 * @package Tests\Browser\Pages\Category
 */
class CategoryIndex extends Page
{
    /**
     * Get the URL for the page.
     *
     * @return string
     */
    public function url()
    {
        return '/admin/categories';
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

    public function assertSeeCategory(Browser $browser, $categoryName)
    {
        $browser->assertSee($categoryName);
    }

    public function assertDontSeeCategory(Browser $browser, $categoryName)
    {
        $browser->assertDontSee($categoryName);
    }

    public function assertSeeCategories(Browser $browser, $categories)
    {
        foreach ($categories as $category) {
            $browser->assertSee($category->name);
        }
    }

    public function assertDontSeeCategories(Browser $browser, $categories)
    {
        foreach ($categories as $category) {
            $browser->assertDontSee($category->name);
        }
    }

    public function pressViewButton(Browser $browser, $categoryId)
    {
        $browser->click('@viewButton' . $categoryId);
    }

    public function pressEditButton(Browser $browser, $categoryId)
    {
        $browser->click('@editButton' . $categoryId);
    }

    public function pressDeleteButton(Browser $browser, $categoryId)
    {
        $browser->click('@deleteButton' . $categoryId);
    }

    public function pressAddCategoryButton(Browser $browser)
    {
        $browser->clickLink('Add Category');
    }

    public function pressDeleteSelected(Browser $browser)
    {
        $browser->clickLink('Delete selected');
    }

    public function deleteCategory(Browser $browser)
    {
        $browser->assertDialogOpened('Are you sure?')
            ->acceptDialog()
            ->assertPathIs('/admin/categories');
    }

    public function selectCategories(Browser $browser, $categories)
    {
        foreach ($categories as $category) {
            $browser->click('@selectCheckbox' . $category->id);
        }
    }
}
