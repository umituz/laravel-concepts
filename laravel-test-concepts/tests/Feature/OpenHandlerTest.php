<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class OpenHandlerTest extends TestCase
{
	/**
	 * Handle
	 *
	 * @return void
	 */
	public function testHandleWithError()
	{
		$response = $this->json('GET', '/_debugbar/open', []);

		$response->assertStatus(400);

	}

	/**
	 * Handle
	 *
	 * @return void
	 */
	public function testHandle()
	{
		$response = $this->json('GET', '/_debugbar/open', []);

		$response->assertStatus(200);

	}

	/**
	 * Clockwork
	 *
	 * @return void
	 */
	public function testClockworkWithError()
	{
		$response = $this->json('GET', '/_debugbar/clockwork/{id}', []);

		$response->assertStatus(400);

	}

	/**
	 * Clockwork
	 *
	 * @return void
	 */
	public function testClockwork()
	{
		$response = $this->json('GET', '/_debugbar/clockwork/{id}', []);

		$response->assertStatus(200);

	}

}
