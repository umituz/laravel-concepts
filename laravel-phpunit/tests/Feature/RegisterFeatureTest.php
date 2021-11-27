<?php

namespace Tests\Feature;

use App\Contracts\UserRepositoryContract;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Hash;
use Tests\Enumerations\UserTestEnumeration;
use Tests\Services\UserTestService;
use Tests\TestCase;

class RegisterFeatureTest extends TestCase
{
    use RefreshDatabase;

    const REGISTER_NAME = 'Ümit Kenan UZ';

    const REGISTER_EMAIL = 'umitkenanuz@gmail.com';

    const REGISTER_PASSWORD = '123456789';

    const REGISTER_ROUTE = 'register';

    /**
     * @var UserRepositoryContract
     */
    protected $userRepository;

    public function setUp(): void
    {
        parent::setUp();
        $this->userRepository = UserTestService::getUserRepository();
    }

    /**
     * @test
     */
    public function user_can_view_registration_form()
    {
        $response = $this->get(self::REGISTER_ROUTE);

        $response->assertSuccessful();
        $response->assertViewIs('auth.register');
        $this->assertGuest();
    }

    /**
     * User cannot view register page when authenticated
     *
     * @test
     */
    public function user_cannot_view_registration_form_when_authenticated()
    {
        $user = UserTestService::createUser();

        $response = $this->actingAs($user)->get(self::REGISTER_ROUTE);

        $response->assertRedirect(RouteServiceProvider::HOME);
        $response->assertStatus(302);
        $this->assertAuthenticatedAs($user);
    }

    /**
     * @test
     */
    public function user_can_register_successfully()
    {
        Event::fake();

        $response = $this->post(self::REGISTER_ROUTE, [
            'name' => 'Ümit Kenan UZ',
            'email' => 'umitkenanuz@gmail.com',
            'password' => '123456789',
            'password_confirmation' => '123456789',
        ]);

        $users = $this->userRepository->getAll();
        $response->assertRedirect(RouteServiceProvider::HOME);
        $this->assertCount(1, $users);
        $this->assertAuthenticatedAs($user = $users->first());

        $this->assertEquals('Ümit Kenan UZ', $user->name);
        $this->assertEquals('umitkenanuz@gmail.com', $user->email);
        $this->assertTrue(Hash::check('123456789', $user->password));

        Event::assertDispatched(Registered::class, function ($event) use ($user) {
            return $event->user->id === $user->id;
        });
    }

    /**
     * User cannot register without name
     *
     * @test
     */
    public function user_cannot_register_without_name()
    {
        $response = $this->from(self::REGISTER_ROUTE)->post(self::REGISTER_ROUTE, [
            'name' => '',
            'email' => 'umitkenanuz@gmail.com',
            'password' => '123456789',
            'password_confirmation' => '123456789',
        ]);

        $users = $this->userRepository->getAll();

        $this->assertCount(0, $users);
        $response->assertRedirect(self::REGISTER_ROUTE);
        $response->assertSessionHasErrors('name');
        $this->assertTrue(session()->hasOldInput('email'));
        $this->assertFalse(session()->hasOldInput('password'));
        $this->assertGuest();
    }

    /**
     * User cannot register without email
     *
     * @test
     */
    public function user_cannot_register_without_email()
    {
        $response = $this->from(self::REGISTER_ROUTE)->post(self::REGISTER_ROUTE, [
            'name' => 'Ümit Kenan Uz',
            'email' => '',
            'password' => '123456789',
            'password_confirmation' => '123456789',
        ]);

        $users = $this->userRepository->getAll();

        $this->assertCount(0, $users);
        $response->assertRedirect(self::REGISTER_ROUTE);
        $response->assertSessionHasErrors('email');
        $this->assertTrue(session()->hasOldInput('name'));
        $this->assertFalse(session()->hasOldInput('password'));
        $this->assertGuest();
    }

    /**
     * User cannot register with invalid email address
     *
     * @test
     */
    public function user_cannot_register_with_invalid_email()
    {
        $response = $this->from(self::REGISTER_ROUTE)->post(self::REGISTER_ROUTE, [
            'name' => self::REGISTER_NAME,
            'email' => UserTestEnumeration::NOT_VALID_EMAIL,
            'password' => self::REGISTER_PASSWORD,
            'password_confirmation' => self::REGISTER_PASSWORD,
        ]);

        $users = $this->userRepository->getAll();

        $this->assertCount(0, $users);
        $response->assertRedirect(self::REGISTER_ROUTE);
        $response->assertSessionHasErrors('email');
        $this->assertTrue(session()->hasOldInput('name'));
        $this->assertTrue(session()->hasOldInput('email'));
        $this->assertFalse(session()->hasOldInput('password'));
        $this->assertGuest();
    }

    /**
     * User cannot register without password
     *
     * @test
     */
    public function user_cannot_register_without_password()
    {
        $response = $this->from(self::REGISTER_ROUTE)->post(self::REGISTER_ROUTE, [
            'name' => self::REGISTER_NAME,
            'email' => self::REGISTER_EMAIL,
            'password' => '',
            'password_confirmation' => '',
        ]);

        $users = $this->userRepository->getAll();

        $this->assertCount(0, $users);
        $response->assertRedirect(self::REGISTER_ROUTE);
        $response->assertSessionHasErrors('password');
        $this->assertTrue(session()->hasOldInput('name'));
        $this->assertTrue(session()->hasOldInput('email'));
        $this->assertFalse(session()->hasOldInput('password'));
        $this->assertGuest();
    }

    /**
     * User cannot register without password confirmation
     *
     * @test
     */
    public function user_cannot_register_without_password_confirmation()
    {
        $response = $this->from(self::REGISTER_ROUTE)->post(self::REGISTER_ROUTE, [
            'name' => self::REGISTER_NAME,
            'email' => self::REGISTER_EMAIL,
            'password' => self::REGISTER_PASSWORD,
            'password_confirmation' => '',
        ]);

        $users = $this->userRepository->getAll();

        $this->assertCount(0, $users);
        $response->assertRedirect(self::REGISTER_ROUTE);
        $response->assertSessionHasErrors('password');
        $this->assertTrue(session()->hasOldInput('name'));
        $this->assertTrue(session()->hasOldInput('email'));
        $this->assertFalse(session()->hasOldInput('password'));
        $this->assertGuest();
    }

    /**
     * User cannot register weith passwords not matching
     *
     * @test
     */
    public function user_cannot_register_with_passwords_not_matching()
    {
        $response = $this->from(self::REGISTER_ROUTE)->post(self::REGISTER_ROUTE, [
            'name' => self::REGISTER_NAME,
            'email' => self::REGISTER_EMAIL,
            'password' => self::REGISTER_PASSWORD,
            'password_confirmation' => '987654321',
        ]);

        $users = $this->userRepository->getAll();

        $this->assertCount(0, $users);
        $response->assertRedirect(self::REGISTER_ROUTE);
        $response->assertSessionHasErrors('password');
        $this->assertTrue(session()->hasOldInput('name'));
        $this->assertTrue(session()->hasOldInput('email'));
        $this->assertFalse(session()->hasOldInput('password'));
        $this->assertGuest();
    }
}
