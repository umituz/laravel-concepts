<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UrlTest extends TestCase
{
	/**
	 * Home
	 *
	 * @return void
	 */
	public function testHomeWithError()
	{
		$response = $this->json('GET', '/', []);

		$response->assertStatus(400);

	}

	/**
	 * Home
	 *
	 * @return void
	 */
	public function testHome()
	{
		$response = $this->json('GET', '/', []);

		$response->assertStatus(200);

	}

}
