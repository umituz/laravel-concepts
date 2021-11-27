<?php

namespace Tests\Browser;

use App\City;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Dusk\Browser;
use Tests\Browser\Pages\City\CityCreate;
use Tests\Browser\Pages\City\CityEdit;
use Tests\Browser\Pages\City\CityIndex;
use Tests\Browser\Pages\City\CityShow;

/**
 * Class CitiesTest
 * @package Tests\Browser
 */
class CitiesTest extends BaseDuskTestCase
{
    use WithFaker;

    /**
     * @test
     * @return void
     */
    public function it_asserts_that_user_can_read_all_cities()
    {
        $cities = City::get();
        $this->browse(function (Browser $browser) use ($cities) {
            $browser->loginAs($this->user)
                ->visit(new CityIndex())
                ->assertSeeCities($cities);
        });
    }

    /**
     * @test
     * @return void
     */
    public function it_asserts_that_user_can_read_a_single_city()
    {
        $city = City::get();
        $randomCity = $city->random();
        $this->browse(function (Browser $browser) use ($randomCity) {
            $browser->loginAs($this->user)
                ->visit(new CityIndex())
                ->pressViewButton($randomCity->id)
                ->on(new CityShow($randomCity->id))
                ->assertSeeCityDetails($randomCity);
        });
    }

    /**
     * @test
     * @return void
     */
    public function it_asserts_that_user_can_add_a_new_city()
    {
        $cityName = $this->faker->city;
        $this->browse(function (Browser $browser) use ($cityName) {
            $browser->loginAs($this->user)
                ->visit(new CityIndex())
                ->pressAddCityButton()
                ->on(new CityCreate())
                ->fillAndSubmitForm($cityName)
                ->on(new CityIndex())
                ->assertSeeCity($cityName);

            $this->assertDatabaseHas('cities', ['name' => $cityName]);

        });
    }

    /**
     * @test
     * @return void
     */
    public function it_asserts_that_user_can_edit_a_city()
    {
        $city = City::get();
        $randomCity = $city->random();
        $this->browse(function (Browser $browser) use ($randomCity) {
            $browser->loginAs($this->user)
                ->visit(new CityIndex())
                ->pressEditButton($randomCity->id)
                ->on(new CityEdit($randomCity->id))
                ->fillAndSubmitForm()
                ->on(new CityIndex())
                ->assertSeeCity($randomCity->name . ' Edited');

            $this->assertDatabaseHas('cities', ['name' => $randomCity->name . ' Edited']);

        });
    }

    /**
     * @test
     * @return void
     */
    public function it_asserts_that_user_can_delete_a_city()
    {
        $city = City::get();
        $randomCity = $city->random();
        $this->browse(function (Browser $browser) use ($randomCity) {
            $browser->loginAs($this->user)
                ->visit(new CityIndex())
                ->pressDeleteButton($randomCity->id)
                ->deleteCity()
                ->assertDontSeeCity($randomCity->name);

            $this->assertSoftDeleted('cities', ['name' => $randomCity->name]);

        });
    }
}
