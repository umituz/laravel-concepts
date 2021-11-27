<?php

namespace Tests\Feature;

use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Tests\Enumerations\UserTestEnumeration;
use Tests\Services\UserTestService;
use Tests\TestCase;

class ForgotPasswordFeatureTest extends TestCase
{
    use RefreshDatabase;

    protected function passwordRequestRoute()
    {
        return route('password.request');
    }

    protected function passwordEmailGetRoute()
    {
        return route('password.email');
    }

    protected function passwordEmailPostRoute()
    {
        return route('password.email');
    }

    /**
     * User can view email password form
     *
     * @test
     */
    public function user_can_view_email_password_form()
    {
        $response = $this->get($this->passwordRequestRoute());

        $response->assertSuccessful();
        $response->assertViewIs('auth.passwords.email');
    }

    /**
     * User can view email password form when authenticated too
     *
     * @test
     */
    public function user_can_view_email_password_form_when_authenticated()
    {
        $user = UserTestService::createUser();

        $response = $this->actingAs($user)->get($this->passwordRequestRoute());

        $response->assertSuccessful();
        $response->assertViewIs('auth.passwords.email');
    }

    /**
     * User can receive email when submit password reset link
     *
     * @test
     */
    public function user_receives_email_with_password_reset_link()
    {
        Notification::fake();

        $user = UserTestService::createUser();

        $response = $this->post($this->passwordEmailPostRoute(), [
            'email' => $user->email,
        ]);

        $this->assertNotNull($token = DB::table('password_resets')->first());

        Notification::assertSentTo($user, ResetPassword::class, function ($notification, $channels) use ($token) {
            return Hash::check($notification->token, $token->token) === true;
        });
    }

    /**
     * User cannot receive email when not registered
     *
     * @test
     */
    public function user_cannot_receive_email_when_not_registered()
    {
        Notification::fake();

        $response = $this->from($this->passwordEmailGetRoute())->post($this->passwordEmailPostRoute(), [
            'email' => UserTestEnumeration::NON_EXIST_EMAIL,
        ]);

        $response->assertRedirect($this->passwordEmailGetRoute());
        $response->assertSessionHasErrors('email');

        Notification::assertNotSentTo(UserTestService::createUser(), ResetPassword::class);
    }

    /**
     * Email input is required
     *
     * @test
     */
    public function email_is_required()
    {
        $response = $this->from($this->passwordEmailGetRoute())->post($this->passwordEmailPostRoute(), []);

        $response->assertRedirect($this->passwordEmailGetRoute());
        $response->assertSessionHasErrors('email');
    }

    /**
     * Email input mus be valid address
     *
     * @test
     */
    public function emailIsAValidEmail()
    {
        $response = $this->from($this->passwordEmailGetRoute())->post($this->passwordEmailPostRoute(), [
            'email' => UserTestEnumeration::NOT_VALID_EMAIL,
        ]);

        $response->assertRedirect($this->passwordEmailGetRoute());
        $response->assertSessionHasErrors('email');
    }
}
