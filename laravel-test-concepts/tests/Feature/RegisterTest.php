<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RegisterTest extends TestCase
{
	/**
	 * ShowRegistrationForm
	 *
	 * @return void
	 */
	public function testShowRegistrationFormWithError()
	{
		$response = $this->json('GET', '/register', []);

		$response->assertStatus(400);

	}

	/**
	 * ShowRegistrationForm
	 *
	 * @return void
	 */
	public function testShowRegistrationForm()
	{
		$response = $this->json('GET', '/register', []);

		$response->assertStatus(200);

	}

	/**
	 * Register
	 *
	 * @return void
	 */
	public function testRegisterWithError()
	{
		$response = $this->json('POST', '/register', []);

		$response->assertStatus(400);

	}

	/**
	 * Register
	 *
	 * @return void
	 */
	public function testRegister()
	{
		$response = $this->json('POST', '/register', []);

		$response->assertStatus(200);

	}

}
