<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CacheTest extends TestCase
{
	/**
	 * Delete
	 *
	 * @return void
	 */
	public function testDeleteWithError()
	{
		$response = $this->json('DELETE', '/_debugbar/cache/{key}/{tags}', []);

		$response->assertStatus(400);

	}

	/**
	 * Delete
	 *
	 * @return void
	 */
	public function testDelete()
	{
		$response = $this->json('DELETE', '/_debugbar/cache/{key}/{tags}', []);

		$response->assertStatus(200);

	}

}
