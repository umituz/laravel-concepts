<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\Browser\Pages\Category\CategoryEdit;
use Tests\Browser\Pages\Category\CategoryShow;
use Tests\Browser\Pages\Category\CategoryIndex;
use Tests\Browser\Pages\Category\CategoryCreate;
use Illuminate\Foundation\Testing\WithFaker;

/**
 * Class CategoriesTest
 * @package Tests\Browser
 */
class CategoriesTest extends BaseDuskTestCase
{
    use WithFaker;

    /** @test */
    public function it_asserts_that_user_can_read_all_categories()
    {
        $categories = factory('App\Category', 10)->create();

        $this->browse(function (Browser $browser) use ($categories) {
            $browser->loginAs('admin@admin.com')
                ->visit(new CategoryIndex)
                ->assertSeeCategories($categories);
        });
    }

    /** @test */
    public function it_asserts_that_user_can_read_a_single_category()
    {
        $category = factory('App\Category', 5)->create();
        $randomCategory = $category->random();

        $this->browse(function (Browser $browser) use ($randomCategory) {
            $browser->loginAs('admin@admin.com')
                ->visit(new CategoryIndex)
                ->pressViewButton($randomCategory->id)
                ->visit(new CategoryShow($randomCategory->id))
                ->assertSeeCategoryDetails($randomCategory);
        });
    }

    /** @test */
    public function it_asserts_that_user_can_add_a_new_category()
    {

        $categoryName = $this->faker->word;

        $this->browse(function (Browser $browser) use ($categoryName) {
            $browser->loginAs('admin@admin.com')
                ->visit(new CategoryIndex)
                ->pressAddCategoryButton()
                ->on(new CategoryCreate)
                ->fillAndSubmitForm($categoryName)
                ->on(new CategoryIndex)
                ->assertSeeCategory($categoryName);

        });

        $this->assertDatabaseHas('categories', ['name' => $categoryName]);
    }

    /** @test */
    public function it_asserts_that_user_can_edit_a_category()
    {

        $category = factory('App\Category', 5)->create();
        $randomCategory = $category->random();

        $this->browse(function (Browser $browser) use ($randomCategory) {
            $browser->loginAs('admin@admin.com')
                ->visit(new CategoryIndex)
                ->pressEditButton($randomCategory->id)
                ->on(new CategoryEdit($randomCategory->id))
                ->fillAndSubmitForm()
                ->on(new CategoryIndex)
                ->assertSeeCategory($randomCategory->name . ' Edited');

        });

        $this->assertDatabaseHas('categories', ['name' => $randomCategory->name . ' Edited']);
    }

    /** @test */
    public function it_asserts_that_user_can_delete_a_category()
    {

        $category = factory('App\Category', 5)->create();
        $randomCategory = $category->random();

        $this->browse(function (Browser $browser) use ($randomCategory) {
            $browser->loginAs('admin@admin.com')
                ->visit(new CategoryIndex)
                ->pressDeleteButton($randomCategory->id)
                ->deleteCategory()
                ->assertDontSeeCategory($randomCategory->name);
        });

        $this->assertSoftDeleted('categories', ['name' => $randomCategory->name]);
    }

    /** @test */
    public function it_asserts_that_user_can_delete_multiple_category()
    {
        $category = factory('App\Category', 10)->create();
        $randomCategory = $category->random(3);

        $this->browse(function (Browser $browser) use ($randomCategory) {
            $browser->loginAs('admin@admin.com')
                ->visit(new CategoryIndex)
                ->pause(2000)
                ->selectCategories($randomCategory)
                ->pressDeleteSelected()
                ->deleteCategory()
                ->pause(2000)
                ->assertDontSeeCategories($randomCategory);
        });
    }
}
