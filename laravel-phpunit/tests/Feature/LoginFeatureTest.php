<?php

namespace Tests\Feature;

use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Tests\Enumerations\UserTestEnumeration;
use Tests\Services\UserTestService;
use Tests\TestCase;

class LoginFeatureTest extends TestCase
{
    use RefreshDatabase;

    const LOGIN_ROUTE = 'login';

    const LOGOUT_ROUTE = 'logout';

    /**
     * User can see login page without any restriction successfully
     *
     * @test
     */
    public function user_can_view_login_form()
    {
        $response = $this->get(self::LOGIN_ROUTE);
        $response->assertViewIs('auth.login');
        $response->assertStatus(200);
        $this->assertGuest();
    }

    /**
     * Users are redirected to homepage from login page after authenticated
     *
     * @test
     */
    public function user_cannot_view_a_login_form_when_authenticated()
    {
        $user = UserTestService::createUser();
        $response = $this->actingAs($user)->get(self::LOGIN_ROUTE);
        $response->assertRedirect('/home');
        $response->assertStatus(302);
        $this->assertAuthenticatedAs($user);

    }

    /**
     * User can login with correct credentials
     *
     * @test
     */
    public function user_can_login_with_correct_credentials()
    {
        $user = UserTestService::createUser();

        $response = $this->post(self::LOGIN_ROUTE, [
            'email' => $user->email,
            'password' => UserTestEnumeration::CORRECT_PASSWORD,
        ]);

        $response->assertRedirect(RouteServiceProvider::HOME);
        $this->assertAuthenticatedAs($user);
    }

    /**
     * User cannot login with wrong password
     *
     * @test
     */
    public function user_cannot_login_with_incorrect_password()
    {
        $user = UserTestService::createUser();

        $response = $this->from(self::LOGIN_ROUTE)->post(self::LOGIN_ROUTE, [
            'email' => $user->email,
            'password' => UserTestEnumeration::WRONG_PASSWORD,
        ]);

        $response->assertRedirect(self::LOGIN_ROUTE);
        $response->assertSessionHasErrors('email');
        $this->assertTrue(session()->hasOldInput('email'));
        $this->assertFalse(session()->hasOldInput('password'));
        $this->assertGuest();
    }

    /**
     * Remember user when clicked checkbox
     *
     * @test
     */
    public function remember_user_when_click_checkbox()
    {
        $user = UserTestService::createUser();

        $response = $this->from(self::LOGIN_ROUTE)->post(self::LOGIN_ROUTE, [
            'email' => $user->email,
            'password' => UserTestEnumeration::CORRECT_PASSWORD,
            'remember' => 'on',
        ]);

        $user = $user->fresh();

        $response->assertRedirect(RouteServiceProvider::HOME);
        $this->assertAuthenticatedAs($user);

        $response->assertCookie(
            Auth::guard()->getRecallerName(),
            vsprintf('%s|%s|%s', [
                $user->id,
                $user->getRememberToken(),
                $user->password,
            ])
        );
    }

    /**
     * User cannot login with non exist email
     *
     * @test
     */
    public function user_cannot_login_with_non_exist_email()
    {
        $response = $this->from(self::LOGIN_ROUTE)->post(self::LOGIN_ROUTE, [
            'email' => UserTestEnumeration::NON_EXIST_EMAIL,
            'password' => UserTestEnumeration::WRONG_PASSWORD,
        ]);

        $response->assertRedirect(self::LOGIN_ROUTE);
        $response->assertSessionHasErrors('email');
        $this->assertTrue(session()->hasOldInput('email'));
        $this->assertFalse(session()->hasOldInput('password'));
        $this->assertGuest();
    }

    /**
     * User can logout successfully
     *
     * @test
     */
    public function user_can_logout_successfully()
    {
        $this->be(
            UserTestService::createUser()
        );

        $response = $this->post(self::LOGOUT_ROUTE);

        $response->assertRedirect('/');
        $this->assertGuest();
    }

    /**
     * User cannot logout when not authenticated
     *
     * @test
     */
    public function user_cannot_logout_when_not_authenticated()
    {
        $response = $this->post(self::LOGOUT_ROUTE);

        $response->assertRedirect('/');
        $this->assertGuest();
    }

    /**
     * User cannot make more than five attempts in one minute
     *
     * @test
     */
    public function user_cannot_make_more_than_five_attempts_in_one_minute()
    {
        $user = UserTestService::createUser();

        foreach (range(0, 5) as $_) {
            $response = $this->from(self::LOGIN_ROUTE)->post(self::LOGIN_ROUTE, [
                'email' => $user->email,
                'password' => UserTestEnumeration::WRONG_PASSWORD,
            ]);
        }

        $this->assertMatchesRegularExpression(
            sprintf('/^%s$/', str_replace('\:seconds', '\d+', preg_quote(__('auth.throttle'), '/'))),
            collect(
                $response
                    ->baseResponse
                    ->getSession()
                    ->get('errors')
                    ->getBag('default')
                    ->get('email')
            )->first()
        );

        $response->assertRedirect(self::LOGIN_ROUTE);
        $response->assertSessionHasErrors('email');
        $this->assertTrue(session()->hasOldInput('email'));
        $this->assertFalse(session()->hasOldInput('password'));
        $this->assertGuest();
    }
}
