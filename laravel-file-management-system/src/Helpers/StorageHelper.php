<?php

namespace Gallery\Helpers;

use Illuminate\Config\Repository;
use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Support\Facades\Storage;
use LaravelHelper\Helpers\CheckHelper;
use LaravelHelper\Helpers\RegexHelper;

/**
 * Class StorageHelper
 * @package Gallery\Helpers
 */
class StorageHelper
{
	/**
	 * @var Repository
	 */
	private $config;
	
	/**
	 * @var Filesystem
	 */
	protected $disk;
	
	/**
	 * StorageHelper constructor.
	 */
	public function __construct()
	{
		$this->config = config('gallery');
		$storage = $this->config['storage_brand'];
		if (!empty($storage)) {
			$this->disk = Storage::disk($storage);
		}
	}
	
	/**
	 * Returns disk property of this class
	 *
	 * @return Filesystem
	 */
	protected static function getDisk()
	{
		return (new self)->disk;
	}
	
	/**
	 * Returns the parameter is a directory or not
	 *
	 * @param $parentDirectory
	 * @param null $childDirectory
	 * @return bool
	 */
	public static function isDirectory($parentDirectory, $childDirectory = null)
	{
		$disk = self::getDisk();
		$directories = $disk->directories($parentDirectory);
		$directories = str_replace($parentDirectory, '', $directories);
		if (CheckHelper::isNotEmpty($childDirectory)) {
			return in_array($childDirectory, $directories);
		} else {
			$parentDirectory = trim($parentDirectory, '/');
			return in_array($parentDirectory, $disk->allDirectories());
		}
	}
	
	/**
	 * Returns directories inside the directory
	 *
	 * @param null $directory
	 * @return array|string|string[]
	 */
	public static function getDirectories($directory = null)
	{
		$disk = self::getDisk();
		$fldr = CheckHelper::isNotEmpty($directory) ? $directory : request('fldr');
		$folders = $disk->directories($fldr);
		$folders = str_replace($fldr, '', $folders);
		$unwantedFiles = implode('|', GalleryHelper::getConfig('unwantedFiles'));
		$willBeRemovedFiles = preg_grep("/^{$unwantedFiles}/i", $folders);
		return array_diff($folders, $willBeRemovedFiles);
	}
	
	/**
	 * Returns files inside the directory
	 *
	 * @param null $directory
	 * @return array|string|string[]
	 */
	public static function getFiles($directory = null)
	{
		$disk = GalleryHelper::getDisk();
		$fldr = CheckHelper::isNotEmpty($directory) ? $directory : request('fldr');
		$files = $disk->files($fldr);
		$files = str_replace($fldr, '', $files);
		return $files;
	}
	
	/**
	 * Scans the directory to find directories and files inside the directory
	 *
	 * @param null $directory
	 * @return array
	 */
	public static function scanDirectory($directory = null)
	{
		$folders = self::getDirectories($directory);
		$files = self::getFiles($directory);
		$foldersAndFiles = array_merge($folders, $files);
		$unwantedFiles = implode('|', GalleryHelper::getConfig('unwantedFiles'));
		$willBeRemovedFiles = preg_grep("/^{$unwantedFiles}/i", $foldersAndFiles);
		return array_diff($foldersAndFiles, $willBeRemovedFiles);
	}
	
	/**
	 * Deletes the specific directory from storage
	 *
	 * @param $directory
	 * @return  bool
	 */
	public static function deleteDirectory($directory)
	{
		$disk = self::getDisk();
		return $disk->deleteDirectory($directory);
	}
	
	/**
	 * Create directory for images and/or thumbnails
	 *
	 * @param null $path
	 * @param null $path_thumbs
	 * @return bool
	 */
	public static function createDirectory($path = null, $path_thumbs = null)
	{
		$disk = self::getDisk();
//		if (!is_null($path_thumbs)) {
//			$path_thumbs = self::fixPath($path_thumbs);
//		}
		if ($disk->exists($path) == false) {
			$disk->makeDirectory($path);
		}
//		if (file_exists($path) || file_exists($path_thumbs)) {
//			return false;
//		}
//		if ($path_thumbs && !file_exists($path_thumbs)) {
//			mkdir($path_thumbs, $permission, true) or die("$path_thumbs cannot be found");
//		}
		// or even 01777 so you get the sticky bit set
		return true;
	}
	
	/**
	 * Renames the specific directory from storage
	 *
	 * @param string $old_path Directory to rename
	 * @param $new_path
	 * @return bool
	 */
	public static function renameDirectory($old_path, $new_path)
	{
		$config = GalleryHelper::getConfig();
		$disk = self::getDisk();
		return $disk->move($config['storage_base_url'] . '/' . $old_path, $config['storage_base_url'] . '/' . $new_path);
	}
	
	/**
	 * Renames the specific file from storage
	 *
	 * @param string $old_path Directory to rename
	 * @param $new_path
	 * @return array|string|null
	 */
	public static function renameFile($old_path, $new_path)
	{
		$disk = self::getDisk();
		if ($disk->exists($old_path)) {
			return $disk->move($old_path, $new_path);
		} else {
			return __('File Not Exists : ' . $old_path);
		}
	}
	
	/**
	 * Duplicates the file
	 *
	 * @param $old_path
	 * @param $new_path
	 * @return bool
	 */
	public static function duplicateFile($old_path, $new_path)
	{
		$disk = self::getDisk();
		return $disk->exists($old_path) ? $disk->copy($old_path, $new_path) : false;
	}
	
	/**
	 * Copies or cuts file to according to request action
	 *
	 * @param $data
	 * @param $action
	 * @param $path
	 * @return bool
	 */
	public static function moveFile($data, $action, $path)
	{
		$disk = self::getDisk();
		$oldPath = RegexHelper::clearUrl($data['path']);
		return self::recursiveMove($disk, $oldPath, $path);
	}
	
	/**
	 * Moves files as recursive
	 *
	 * @param $disk
	 * @param $oldPath
	 * @param $path
	 * @param bool $is_rec
	 * @return bool
	 */
	protected static function recursiveMove($disk, $oldPath, $path, $is_rec = false)
	{
		if (self::isDirectory($oldPath)) {
			if ($is_rec === false) {
				$pinfo = pathinfo($oldPath);
				$destination = rtrim($path, '/') . '/' . $pinfo['basename'];
			}
			if (self::isDirectory($destination) === false) {
				$disk->makeDirectory($destination);
			}
			$files = self::scanDirectory($oldPath);
			foreach ($files as $file) {
				if ($file != "." && $file != ".." && !self::isDirectory($oldPath . $file)) {
					$disk->copy($oldPath . '/' . $file, rtrim($destination, '/') . '/' . $file);
				} else {
//					@todo NOT WORK EXACTLY AT MOMENT
//				return self::recursiveMove($disk, $oldPath . $file, rtrim($destination, '/') . $file);
				}
			}
			return $disk->deleteDirectory($oldPath);
		} else {
			if (self::isDirectory($path) === true) {
				$pinfo = pathinfo($oldPath);
				$destination = rtrim($path, '/') . '/' . $pinfo['basename'];
			} else {
				$destination = '/' . last(explode('/', $oldPath));
			}
			$response = $disk->exists($oldPath) ? $disk->copy($oldPath, $destination) : false;
			if ($response) {
				$disk->delete($oldPath);
			}
			return $response;
		}
	}
	
	/**
	 * Saves text file
	 *
	 * @param $path
	 * @param $content
	 * @return mixed
	 */
	public static function saveTextFile($path, $content)
	{
		$disk = self::getDisk();
		if ($disk->exists($path)) {
			$disk->put($path, "Ümit UZ");
			return GalleryHelper::response(trans('File_Save_OK'))->send();
		} else {
			return GalleryHelper::response(__('File Not Found') . GalleryHelper::addErrorLocation())->send();
		}
	}
	
	/**
	 * Creates a new file
	 *
	 * @param $path
	 * @param $content
	 * @return bool
	 */
	public static function createFile($path, $content)
	{
		$disk = self::getDisk();
		if ($disk->exists($path) == false) {
			return $disk->put($path, $content);
		} else {
			GalleryHelper::response(__('Existing File') . GalleryHelper::addErrorLocation())->send();
			exit;
		}
	}
	
	/**
	 * Uploads a new file
	 *
	 * @param $path
	 * @param $content
	 * @return bool
	 */
	public static function uploadFile($path, $content)
	{
		$disk = self::getDisk();
		return !$disk->exists($path) ? $disk->put($path, $content) : false;
	}
	
	/**
	 * Deletes the specific file
	 *
	 * @param $path
	 * @return bool
	 */
	public static function deleteFile($path)
	{
		$disk = self::getDisk();
		return $disk->exists($path) ? $disk->delete($path) : false;
	}
}