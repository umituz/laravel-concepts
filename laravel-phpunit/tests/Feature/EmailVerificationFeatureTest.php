<?php

namespace Tests\Feature;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\URL;
use Tests\Services\UserTestService;
use Tests\TestCase;

class EmailVerificationFeatureTest extends TestCase
{
    use RefreshDatabase;

    protected $verificationVerifyRouteName = 'verification.verify';

    protected function successfulVerificationRoute()
    {
        return route('home');
    }

    protected function verificationNoticeRoute()
    {
        return route('verification.notice');
    }

    protected function validVerificationVerifyRoute($user)
    {
        return URL::signedRoute($this->verificationVerifyRouteName, [
            'id' => $user->id,
            'hash' => sha1($user->getEmailForVerification()),
        ]);
    }

    protected function invalidVerificationVerifyRoute($user)
    {
        return route($this->verificationVerifyRouteName, [
            'id' => $user->id,
            'hash' => 'invalid-hash',
        ]);
    }

    protected function verificationResendRoute()
    {
        return route('verification.resend');
    }

    protected function loginRoute()
    {
        return route('login');
    }

    /**
     * Guest cannot see the verification notice
     *
     * @test
     */
    public function guest_cannot_see_verification_notice()
    {
        $response = $this->get($this->verificationNoticeRoute());

        $response->assertRedirect($this->loginRoute());
    }

    /**
     * Authenticated user can see verification notice
     *
     * @test
     */
    public function user_can_see_verification_notice_when_not_verified()
    {
        $user = UserTestService::createUser([
            'email_verified_at' => null,
        ]);

        $response = $this->actingAs($user)->get($this->verificationNoticeRoute());

        $response->assertStatus(200);
        $response->assertViewIs('auth.verify');
    }

    /**
     * Verified user must be redirected when visiting verification notice route
     *
     * @test
     */
    public function verified_user_must_be_redirected_when_visiting_verification_notice_route()
    {
        $user = UserTestService::createUser([
            'email_verified_at' => now(),
        ]);

        $response = $this->actingAs($user)->get($this->verificationNoticeRoute());

        $response->assertRedirect($this->successfulVerificationRoute());
    }

    /**
     * Guest cannot see verification verify route
     *
     * @test
     */
    public function guest_cannot_see_verification_verify_route()
    {
        $user = UserTestService::createUser([
            'email_verified_at' => null,
        ]);

        $response = $this->get($this->validVerificationVerifyRoute($user));

        $response->assertRedirect($this->loginRoute());
    }

    /**
     * A user cannot verify other user account
     *
     * @test
     */
    public function user_cannot_verify_others()
    {
        $user = UserTestService::createUser([
            'email_verified_at' => null,
        ]);

        $user2 = UserTestService::createUser([
            'email_verified_at' => null,
        ]);

        $response = $this->actingAs($user)->get($this->validVerificationVerifyRoute($user2));

        $response->assertForbidden();

        $this->assertFalse($user2->fresh()->hasVerifiedEmail());
    }

    /**
     * @test
     */
    public function user_must_be_redirected_to_correct_route_when_already_verified()
    {
        $user = UserTestService::createUser([
            'email_verified_at' => now(),
        ]);

        $response = $this->actingAs($user)->get($this->validVerificationVerifyRoute($user));

        $response->assertRedirect($this->successfulVerificationRoute());
    }

    /**
     * When url signature is not valid catch 403
     *
     * @test
     */
    public function forbidden_is_returned_when_signature_is_invalid_in_verification_verify_route()
    {
        $user = UserTestService::createUser([
            'email_verified_at' => now(),
        ]);

        $response = $this->actingAs($user)->get($this->invalidVerificationVerifyRoute($user));

        $response->assertStatus(403);
    }

    /**
     * User can verify themselves
     *
     * @test
     */
    public function user_can_verify_themselves()
    {
        $user = UserTestService::createUser([
            'email_verified_at' => null,
        ]);

        $response = $this->actingAs($user)->get($this->validVerificationVerifyRoute($user));

        $response->assertRedirect($this->successfulVerificationRoute());
        $this->assertNotNull($user->fresh()->email_verified_at);
    }

    /**
     * Guest cannot resend verification email
     *
     * @test
     */
    public function guest_cannot_resend_verification_email()
    {
        $response = $this->post($this->verificationResendRoute());

        $response->assertRedirect($this->loginRoute());
    }

    /**
     * User can resend verification email
     *
     * @test
     */
    public function user_can_resend_verification_email()
    {
        Notification::fake();
        $user = UserTestService::createUser([
            'email_verified_at' => null,
        ]);

        $response = $this->actingAs($user)
            ->from($this->verificationNoticeRoute())
            ->post($this->verificationResendRoute());

        Notification::assertSentTo($user, VerifyEmail::class);
        $response->assertRedirect($this->verificationNoticeRoute());
    }


}
