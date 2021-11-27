<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ForgotPasswordTest extends TestCase
{
	/**
	 * ShowLinkRequestForm
	 *
	 * @return void
	 */
	public function testShowLinkRequestFormWithError()
	{
		$response = $this->json('GET', '/password/reset', []);

		$response->assertStatus(400);

	}

	/**
	 * ShowLinkRequestForm
	 *
	 * @return void
	 */
	public function testShowLinkRequestForm()
	{
		$response = $this->json('GET', '/password/reset', []);

		$response->assertStatus(200);

	}

	/**
	 * SendResetLinkEmail
	 *
	 * @return void
	 */
	public function testSendResetLinkEmailWithError()
	{
		$response = $this->json('POST', '/password/email', []);

		$response->assertStatus(400);

	}

	/**
	 * SendResetLinkEmail
	 *
	 * @return void
	 */
	public function testSendResetLinkEmail()
	{
		$response = $this->json('POST', '/password/email', []);

		$response->assertStatus(200);

	}

}
