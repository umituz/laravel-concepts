<?php

namespace LaravelHelper\Providers;

use Illuminate\Support\ServiceProvider;

/**
 * Class LaravelHelperServiceProvider
 * @package LaravelHelper\Providers
 */
class LaravelHelperServiceProvider extends ServiceProvider
{
	/**
	 * Boot
	 */
	public function boot()
	{
		if ($this->app->runningInConsole()) {
			
			$this->registerPublishing();
		}
	}
	
	/**
	 * Register
	 */
	public function register()
	{
		//
	}
	
	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array('laravel-helpers');
	}
	
	/**
	 * Register publishing
	 */
	protected function registerPublishing()
	{
		$this->publishes([
			__DIR__ . '/../../config/helpers.php' => config_path('helpers.php')
		], 'laravel-helpers-config');
	}
}