<?php

namespace Gallery\Services;

use Illuminate\Filesystem\FilesystemManager;

/**
 * Class GoogleStorage
 * @package Gallery\Services
 */
class GoogleStorage extends FilesystemManager
{
	/**
	 * @hey
	 */
	public function test()
	{
		return "here to here";
	}
	
	/**
	 * @inheritDoc
	 */
	public function exists($path)
	{
		// TODO: Implement exists() method.
	}
	
	/**
	 * @inheritDoc
	 */
	public function readStream($path)
	{
		// TODO: Implement readStream() method.
	}
	
	/**
	 * @inheritDoc
	 */
	public function put($path, $contents, $options = [])
	{
		// TODO: Implement put() method.
	}
	
	/**
	 * @inheritDoc
	 */
	public function writeStream($path, $resource, array $options = [])
	{
		// TODO: Implement writeStream() method.
	}
	
	/**
	 * @inheritDoc
	 */
	public function getVisibility($path)
	{
		// TODO: Implement getVisibility() method.
	}
	
	/**
	 * @inheritDoc
	 */
	public function setVisibility($path, $visibility)
	{
		// TODO: Implement setVisibility() method.
	}
	
	/**
	 * @inheritDoc
	 */
	public function prepend($path, $data)
	{
		// TODO: Implement prepend() method.
	}
	
	/**
	 * @inheritDoc
	 */
	public function append($path, $data)
	{
		// TODO: Implement append() method.
	}
	
	/**
	 * @inheritDoc
	 */
	public function delete($paths)
	{
		// TODO: Implement delete() method.
	}
	
	/**
	 * @inheritDoc
	 */
	public function copy($from, $to)
	{
		// TODO: Implement copy() method.
	}
	
	/**
	 * @inheritDoc
	 */
	public function move($from, $to)
	{
		// TODO: Implement move() method.
	}
	
	/**
	 * @inheritDoc
	 */
	public function size($path)
	{
		// TODO: Implement size() method.
	}
	
	/**
	 * @inheritDoc
	 */
	public function lastModified($path)
	{
		// TODO: Implement lastModified() method.
	}
	
	/**
	 * @inheritDoc
	 */
	public function files($directory = null, $recursive = false)
	{
		// TODO: Implement files() method.
	}
	
	/**
	 * @inheritDoc
	 */
	public function allFiles($directory = null)
	{
		// TODO: Implement allFiles() method.
	}
	
	/**
	 * @inheritDoc
	 */
	public function directories($directory = null, $recursive = false)
	{
		// TODO: Implement directories() method.
	}
	
	/**
	 * @inheritDoc
	 */
	public function allDirectories($directory = null)
	{
		// TODO: Implement allDirectories() method.
	}
	
	/**
	 * @inheritDoc
	 */
	public function makeDirectory($path)
	{
		// TODO: Implement makeDirectory() method.
	}
	
	/**
	 * @inheritDoc
	 */
	public function deleteDirectory($directory)
	{
		// TODO: Implement deleteDirectory() method.
	}
}