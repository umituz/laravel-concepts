<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ResetPasswordTest extends TestCase
{
	/**
	 * ShowResetForm
	 *
	 * @return void
	 */
	public function testShowResetFormWithError()
	{
		$response = $this->json('GET', '/password/reset/{token}', []);

		$response->assertStatus(400);

	}

	/**
	 * ShowResetForm
	 *
	 * @return void
	 */
	public function testShowResetForm()
	{
		$response = $this->json('GET', '/password/reset/{token}', []);

		$response->assertStatus(200);

	}

	/**
	 * Reset
	 *
	 * @return void
	 */
	public function testResetWithError()
	{
		$response = $this->json('POST', '/password/reset', []);

		$response->assertStatus(400);

	}

	/**
	 * Reset
	 *
	 * @return void
	 */
	public function testReset()
	{
		$response = $this->json('POST', '/password/reset', []);

		$response->assertStatus(200);

	}

}
