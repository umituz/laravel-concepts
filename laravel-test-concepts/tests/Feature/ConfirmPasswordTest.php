<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ConfirmPasswordTest extends TestCase
{
	/**
	 * ShowConfirmForm
	 *
	 * @return void
	 */
	public function testShowConfirmFormWithError()
	{
		$response = $this->json('GET', '/password/confirm', []);

		$response->assertStatus(400);

	}

	/**
	 * ShowConfirmForm
	 *
	 * @return void
	 */
	public function testShowConfirmForm()
	{
		$response = $this->json('GET', '/password/confirm', []);

		$response->assertStatus(200);

	}

	/**
	 * Confirm
	 *
	 * @return void
	 */
	public function testConfirmWithError()
	{
		$response = $this->json('POST', '/password/confirm', []);

		$response->assertStatus(400);

	}

	/**
	 * Confirm
	 *
	 * @return void
	 */
	public function testConfirm()
	{
		$response = $this->json('POST', '/password/confirm', []);

		$response->assertStatus(200);

	}

}
