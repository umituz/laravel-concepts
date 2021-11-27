<?php

namespace Tests\Browser;

use App\User;
use Laravel\Dusk\Browser;

/**
 * Class AuthenticationTest
 * @package Tests\Browser
 */
class AuthenticationTest extends BaseDuskTestCase
{
    protected $adminUser;

    protected $nonAdminUser;

    public function setUp(): void
    {
        parent::setUp();
        $this->adminUser = User::find(1);
        $this->nonAdminUser = User::find(2);
    }

    /**
     * @test
     * @return void
     */
    public function it_asserts_that_user_can_login()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                ->assertSee('Classifieds')
                ->type('email', 'admin@admin.com')
                ->type('password', 'password')
                ->press('Login')
                ->assertPathIs('/admin/companies')
                ->assertSee('Company List')
                ->assertAuthenticated();
        });
    }

    /**
     * @test
     * @return void
     */
    public function it_asserts_that_user_can_logout()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->user)
                ->visit('/admin')
                ->clickLink('Logout')
                ->assertGuest();
        });
    }

    /**
     * @test
     * @return void
     */
    public function it_asserts_that_incorrect_login_fails()
    {
        $this->browse(function (Browser $browser) {

            $browser->visit('/login')
                ->assertSee('Classifieds')
                ->type('email', 'admin@admin.com')
                ->type('password', '123456')
                ->press('Login')
                ->assertPathIs('/login')
                ->assertSee('These credentials do not match our records.')
                ->assertElementHasClass('input[name="email"]', 'is-invalid'); // custom macro
        });
    }

    /**
     * @test
     * @return void
     */
    public function it_asserts_that_admin_can_access_user_management_system()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->adminUser)
                ->visit('/admin')
                ->assertSee('User management')
                ->visit('/admin/users')
                ->assertSee('User List');
        });
    }

    /**
     * @test
     * @return void
     */
    public function it_asserts_that_non_admin_cannot_access_user_management_system()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->nonAdminUser)
                ->visit('/admin')
                ->assertDontSee('User management')
                ->visit('/admin/users')
                ->assertSee('403 FORBIDDEN');
        });
    }
}
