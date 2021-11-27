<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class Test extends TestCase
{
	/**
	 * Webpage
	 *
	 * @return void
	 */
	public function testWebpageWithError()
	{
		$response = $this->json('GET', '/docs', []);

		$response->assertStatus(400);

	}

	/**
	 * Webpage
	 *
	 * @return void
	 */
	public function testWebpage()
	{
		$response = $this->json('GET', '/docs', []);

		$response->assertStatus(200);

	}

	/**
	 * Postman
	 *
	 * @return void
	 */
	public function testPostmanWithError()
	{
		$response = $this->json('GET', '/docs.postman', []);

		$response->assertStatus(400);

	}

	/**
	 * Postman
	 *
	 * @return void
	 */
	public function testPostman()
	{
		$response = $this->json('GET', '/docs.postman', []);

		$response->assertStatus(200);

	}

	/**
	 * Openapi
	 *
	 * @return void
	 */
	public function testOpenapiWithError()
	{
		$response = $this->json('GET', '/docs.openapi', []);

		$response->assertStatus(400);

	}

	/**
	 * Openapi
	 *
	 * @return void
	 */
	public function testOpenapi()
	{
		$response = $this->json('GET', '/docs.openapi', []);

		$response->assertStatus(200);

	}

	/**
	 * Losure
	 *
	 * @return void
	 */
	public function testLosureWithError()
	{
		$response = $this->json('GET', '/api/user', [], [
			'Authorization' => 'Bearer '
		]);

		$response->assertStatus(400);

	}

	/**
	 * Losure
	 *
	 * @return void
	 */
	public function testLosure()
	{
		$response = $this->json('GET', '/api/user', [], [
			'Authorization' => 'Bearer '
		]);

		$response->assertStatus(200);

	}

}
