<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
	/**
	 * Login
	 *
	 * @return void
	 */
	public function testLoginWithError()
	{
		$response = $this->json('GET', '/_dusk/login/{userId}/{guard}', []);

		$response->assertStatus(400);

	}

	/**
	 * Login
	 *
	 * @return void
	 */
	public function testLogin()
	{
		$response = $this->json('GET', '/_dusk/login/{userId}/{guard}', []);

		$response->assertStatus(200);

	}

	/**
	 * Logout
	 *
	 * @return void
	 */
	public function testLogoutWithError()
	{
		$response = $this->json('GET', '/_dusk/logout/{guard}', []);

		$response->assertStatus(400);

	}

	/**
	 * Logout
	 *
	 * @return void
	 */
	public function testLogout()
	{
		$response = $this->json('GET', '/_dusk/logout/{guard}', []);

		$response->assertStatus(200);

	}

	/**
	 * User
	 *
	 * @return void
	 */
	public function testUserWithError()
	{
		$response = $this->json('GET', '/_dusk/user/{guard}', []);

		$response->assertStatus(400);

	}

	/**
	 * User
	 *
	 * @return void
	 */
	public function testUser()
	{
		$response = $this->json('GET', '/_dusk/user/{guard}', []);

		$response->assertStatus(200);

	}

}
