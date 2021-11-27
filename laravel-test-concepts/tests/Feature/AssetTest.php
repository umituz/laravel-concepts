<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AssetTest extends TestCase
{
	/**
	 * Css
	 *
	 * @return void
	 */
	public function testCssWithError()
	{
		$response = $this->json('GET', '/_debugbar/assets/stylesheets', []);

		$response->assertStatus(400);

	}

	/**
	 * Css
	 *
	 * @return void
	 */
	public function testCss()
	{
		$response = $this->json('GET', '/_debugbar/assets/stylesheets', []);

		$response->assertStatus(200);

	}

	/**
	 * Js
	 *
	 * @return void
	 */
	public function testJsWithError()
	{
		$response = $this->json('GET', '/_debugbar/assets/javascript', []);

		$response->assertStatus(400);

	}

	/**
	 * Js
	 *
	 * @return void
	 */
	public function testJs()
	{
		$response = $this->json('GET', '/_debugbar/assets/javascript', []);

		$response->assertStatus(200);

	}

}
