<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoginTest extends TestCase
{
	/**
	 * ShowLoginForm
	 *
	 * @return void
	 */
	public function testShowLoginFormWithError()
	{
		$response = $this->json('GET', '/login', []);

		$response->assertStatus(400);

	}

	/**
	 * ShowLoginForm
	 *
	 * @return void
	 */
	public function testShowLoginForm()
	{
		$response = $this->json('GET', '/login', []);

		$response->assertStatus(200);

	}

	/**
	 * Login
	 *
	 * @return void
	 */
	public function testLoginWithError()
	{
		$response = $this->json('POST', '/login', []);

		$response->assertStatus(400);

	}

	/**
	 * Login
	 *
	 * @return void
	 */
	public function testLogin()
	{
		$response = $this->json('POST', '/login', []);

		$response->assertStatus(200);

	}

	/**
	 * Logout
	 *
	 * @return void
	 */
	public function testLogoutWithError()
	{
		$response = $this->json('POST', '/logout', []);

		$response->assertStatus(400);

	}

	/**
	 * Logout
	 *
	 * @return void
	 */
	public function testLogout()
	{
		$response = $this->json('POST', '/logout', []);

		$response->assertStatus(200);

	}

}
