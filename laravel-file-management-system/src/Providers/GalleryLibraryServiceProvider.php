<?php

namespace Gallery\Providers;

use Gallery\GalleryLibrary;
use Gallery\Services\GoogleStorage;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Collection;
use Illuminate\Support\ServiceProvider;

/**
 * Class GalleryLibraryServiceProvider
 * @package Gallery\Providers
 */
class GalleryLibraryServiceProvider extends ServiceProvider
{
	/**
	 * Boot
	 * @param Filesystem $filesystem
	 */
	public function boot(Filesystem $filesystem)
	{
		$this->loadViewsFrom(__DIR__ . '/../../Resources/views', 'laravel-gallery');
		
		$this->loadRoutesFrom(__DIR__ . '/../Routes/gallery.php');
		
		$this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');
		
		if ($this->app->runningInConsole()) {
			
			$this->registerPublishing($filesystem);
		}
	}
	
	/**
	 * Register
	 */
	public function register()
	{
		$this->facades();
	}
	
	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array('gallery');
	}
	
	/**
	 * Register publishing
	 * @param $filesystem
	 */
	protected function registerPublishing($filesystem)
	{
		$this->publishes([
			__DIR__ . '/../../config/gallery.php' => config_path('gallery.php')
		], 'laravel-gallery-config');
		
		$this->publishes([
			__DIR__ . '/../../public' => public_path('vendor/laravel-gallery'),
		], 'laravel-gallery-public');
		
		$this->publishes([
			__DIR__ . '/../Resources/views' => base_path('resources/views/vendor/laravel-gallery'),
		], 'laravel-gallery-view');
		
		$this->publishes([
			__DIR__ . '/../../database/migrations/create_gallery_table.php.stub' => $this->getMigrationFileName($filesystem)
		], 'laravel-gallery-migrations');
		
		$jsPath = config('gallery.webpack.folders.js');
		$this->publishes([
			__DIR__ . '/../Resources/js' =>
				resource_path($jsPath . '/vendor/laravel-gallery'
				)], 'laravel-gallery-js');
	}
	
	/**
	 * Returns existing migration file if found, else uses the current timestamp.
	 *
	 * @param Filesystem $filesystem
	 * @return string
	 */
	protected function getMigrationFileName(Filesystem $filesystem): string
	{
		$timestamp = date('Y_m_d_His');
		
		return Collection::make(
			$this->app->databasePath() . DIRECTORY_SEPARATOR . 'migrations' . DIRECTORY_SEPARATOR
		)
			->flatMap(function ($path) use ($filesystem) {
				return $filesystem->glob($path . '*_create_gallery_table.php');
			})->push($this->app->databasePath() . "/migrations/{$timestamp}_create_gallery_table.php")
			->first();
	}
	
	/**
	 * Laravel Gallery app facades
	 */
	protected function facades()
	{
		$this->app->singleton('GoogleStorage', function ($app) {
			return new GoogleStorage($app);
		});
		
		$this->app->singleton('Gallery', function () {
			return new GalleryLibrary();
		});
	}
}