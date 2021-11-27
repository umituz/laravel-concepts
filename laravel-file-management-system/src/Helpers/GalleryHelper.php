<?php

namespace Gallery\Helpers;

use Gallery\Entities\File;
use Gallery\Enumerations\GalleryEnumeration;
use Gallery\Services\FtpClient;
use Gallery\Services\FtpException;
use Gallery\Services\ImageLibraryService;
use DirectoryIterator;
use Exception;
use Illuminate\Config\Repository;
use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Session\SessionManager;
use Illuminate\Session\Store;
use Illuminate\Support\Facades\Storage;
use LaravelHelper\Helpers\CheckHelper;
use LaravelHelper\Helpers\SecurityHelper;

/**
 * Class GalleryHelper
 * @property Repository|mixed config
 * @property FtpClient|bool ftp
 * @property Filesystem disk
 * @package Gallery\Helpers
 */
class GalleryHelper
{
	/**
	 * /**
	 * @var Repository
	 */
	protected $config;
	
	/**
	 * @var FtpClient|bool
	 */
	protected $ftp;
	
	/**
	 * @var Filesystem
	 */
	protected $disk;
	
	/**
	 * GalleryHelper constructor.
	 */
	public function __construct()
	{
		$this->config = config('gallery');
		
		$this->ftp = false;
//		$this->ftp = FtpHelper::ftpConnection($this->config);
		
		$storage = $this->config['storage_brand'];
		
		if (!empty($storage)) {
			
			$this->disk = Storage::disk($storage);
			
		}
	}
	
	/**
	 * Returns config property of this class
	 *
	 * @param null $element
	 * @return Repository|mixed
	 */
	public static function getConfig($element = null)
	{
		$config = (new self)->config;
		
		return !is_null($element) ? $config[$element] : $config;
	}
	
	/**
	 * Returns ftp property of this class
	 *
	 * @return Repository|mixed
	 */
	public static function getFtp()
	{
		return (new self)->ftp;
	}
	
	/**
	 * Returns disk property of this class
	 *
	 * @return Filesystem
	 */
	public static function getDisk()
	{
		return (new self)->disk;
	}
	
	/**
	 * Cleanup filename
	 *
	 * @param $str
	 * @param bool $is_folder
	 * @return string
	 */
	public static function fixFileName($str, $is_folder = false)
	{
		$str = SecurityHelper::sanitize($str, true);
		
		if (self::getConfig('convert_spaces')) {
			
			$str = str_replace(' ', self::getConfig('replace_with'), $str);
			
		}
		
		if (self::getConfig('transliteration')) {
			
			if (!mb_detect_encoding($str, 'UTF-8', true)) {
				
				$str = utf8_encode($str);
				
			}
			
			if (function_exists('transliterator_transliterate')) {
				
				$str = transliterator_transliterate('Any-Latin; Latin-ASCII', $str);
				
			} else {
				
				$str = iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE', $str);
				
			}
			
			$str = preg_replace("/[^a-zA-Z0-9\.\[\]_| -]/", '', $str);
		}
		
		$str = str_replace(array('"', "'", "/", "\\"), "", $str);
		
		$str = strip_tags($str);
		
		// Empty or incorrectly transliterated filename.
		// Here is a point: a good file UNKNOWN_LANGUAGE.jpg could become .jpg in previous code.
		// So we add that default 'file' name to fix that issue.
		if (!self::getConfig('empty_filename') && strpos($str, '.') === 0 && $is_folder === false) {
			
			$str = 'file' . $str;
			
		}
		
		return trim($str);
	}
	
	/**
	 * Fix path
	 *
	 * @param $path
	 * @return string
	 */
	public static function fixPath($path)
	{
		$info = pathinfo($path);
		
		$tmp_path = $info['dirname'] ?? null;
		
		$str = self::fixFileName($info['filename']);
		
		if ($tmp_path != "") {
			
			return $tmp_path . '/' . $str;
			
		} else {
			
			return $str;
			
		}
	}
	
	/**
	 * Create directory for images and/or thumbnails
	 *
	 * @param null $path
	 * @param null $path_thumbs
	 * @return bool
	 */
	public static function createFolder($path = null, $path_thumbs = null)
	{
		$config = self::getConfig();
		if (!is_null($path)) {
			$path = self::fixPath($path);
		}
		switch ($config['filesystem']) {
			case GalleryEnumeration::STORAGE:
				return StorageHelper::createDirectory($path);
				break;
			case GalleryEnumeration::FTP:
				return FtpHelper::createDirectory($path);
				break;
			case GalleryEnumeration::LOCAL:
				return LocalHelper::createDirectory($path);
				break;
			default:
				return false;
		}
	}
	
	/**
	 * Checks relative path
	 *
	 * @param string $path
	 * @return boolean is it correct?
	 */
	public static function checkRelativePath($path)
	{
		$path_correct = self::checkRelativePathPartial($path);
		
		if ($path_correct) {
			
			$path_decoded = rawurldecode($path);
			
			$path_correct = self::checkRelativePathPartial($path_decoded);
			
		}
		
		return $path_correct;
	}
	
	/**
	 * Checks relative path partial
	 *
	 * @param $path
	 * @return bool
	 */
	public static function checkRelativePathPartial($path)
	{
		if (strpos($path, '../') !== false
			|| strpos($path, './') !== false
			|| strpos($path, '/..') !== false
			|| strpos($path, '..\\') !== false
			|| strpos($path, '\\..') !== false
			|| strpos($path, '.\\') !== false
			|| $path === ".."
		) {
			return false;
		}
		
		return true;
	}
	
	/**
	 * Sorts according to filename
	 *
	 * @param $x
	 * @param $y
	 * @return bool|mixed
	 */
//	public static function filenameSort($x, $y)
//	{
//		global $descending;
//
//		if ($x['is_dir'] !== $y['is_dir']) {
//
//			return $y['is_dir'];
//
//		} else {
//
//			return ($descending)
//				? $x['file_lcase'] < $y['file_lcase']
//				: $x['file_lcase'] >= $y['file_lcase'];
//		}
//	}
	
	/**
	 * Sorts according to date
	 *
	 * @param $x
	 * @param $y
	 * @return bool|mixed
	 */
//	public static function dateSort($x, $y)
//	{
//		global $descending;
//
//		if ($x['is_dir'] !== $y['is_dir']) {
//
//			return $y['is_dir'];
//
//		} else {
//
//			return ($descending)
//				? $x['date'] < $y['date']
//				: $x['date'] >= $y['date'];
//
//		}
//	}
	
	/**
	 * Sorts according to size
	 *
	 * @param $x
	 * @param $y
	 * @return bool|mixed
	 */
//	public static function sizeSort($x, $y)
//	{
//		global $descending;
//
//		if ($x['is_dir'] !== $y['is_dir']) {
//
//			return $y['is_dir'];
//
//		} else {
//
//			return ($descending)
//				? $x['size'] < $y['size']
//				: $x['size'] >= $y['size'];
//
//		}
//	}
	
	/**
	 * Sorts according to extension
	 *
	 * @param $x
	 * @param $y
	 * @return bool|mixed
	 */
//	public static function extensionSort($x, $y)
//	{
//		global $descending;
//
//		if ($x['is_dir'] !== $y['is_dir']) {
//
//			return $y['is_dir'];
//
//		} else {
//
//			return ($descending)
//				? $x['extension'] < $y['extension']
//				: $x['extension'] >= $y['extension'];
//
//		}
//	}
	
	/**
	 * Returns path
	 *
	 * @param $_path
	 * @param $_name
	 * @return array
	 */
	public static function returnPaths($_path, $_name)
	{
		$ftp = self::getFtp();
		
		$config = self::getConfig();
		
		$path = $config['current_path'] . $_path;
		
		$path_thumb = $config['thumbs_base_path'] . $_path;
		
		$name = null;
		
		if ($ftp) {
			
			$path = $config['ftp_base_folder'] . $config['upload_dir'] . $_path;
			
			$path_thumb = $config['ftp_base_folder'] . $config['ftp_thumbs_dir'] . $_path;
			
		}
		
		if ($_name) {
			
			$name = GalleryHelper::fixFileName($_name, $config);
			
			if (strpos($name, '../') !== false || strpos($name, '..\\') !== false) {
				
				GalleryHelper::response(trans('wrong name') . self::addErrorLocation())->send();
				
				exit;
				
			}
			
		}
		
		return array($path, $path_thumb, $name);
	}
	
	/**
	 * Cleanup input
	 *
	 * @param string $str
	 *
	 * @return  string
	 */
	public static function fixGetParams($str)
	{
		return strip_tags(preg_replace("/[^a-zA-Z0-9\.\[\]_| -]/", '', $str));
	}
	
	/**
	 * Cleanup directory name
	 *
	 * @param string $str
	 *
	 * @return  string
	 */
	public static function fixDirname($str)
	{
		return str_replace('~', ' ', dirname(str_replace(' ', '~', $str)));
	}
	
	/**
	 * Rename folder
	 *
	 * @param string $old_path Directory to rename
	 * @param string $name New directory name
	 * @return bool
	 * @throws FtpException
	 */
	public static function renameFolder($old_path, $name)
	{
		$config = self::getConfig();
		$name = self::fixFileName($name);
		$new_path = self::fixDirname($old_path) . "/" . $name;
		switch ($config['filesystem']) {
			case GalleryEnumeration::STORAGE:
				return StorageHelper::renameDirectory($old_path, $new_path);
				break;
			case GalleryEnumeration::FTP:
				return FtpHelper::renameDirectory($old_path, $new_path);
				break;
			case GalleryEnumeration::LOCAL:
				return LocalHelper::renameDirectory($old_path, $new_path);
				break;
			default:
				return false;
		}
	}
	
	/**
	 * Check if the given path is an upload dir based on config
	 *
	 * @param string $path
	 * @return boolean is it an upload dir?
	 */
	public static function isUploadDir($path)
	{
		$config = self::getConfig();
		
		$upload_dir = $config['current_path'];
		
		$thumbs_dir = $config['thumbs_base_path'];
		
		if (realpath($path) === realpath($upload_dir) || realpath($path) === realpath($thumbs_dir)) {
			
			return true;
			
		}
		
		return false;
	}
	
	/**
	 * Delete directory
	 *
	 * @param string $dir
	 * @return  bool
	 * @throws FtpException
	 */
	public static function deleteDir($dir)
	{
		$config = self::getConfig();
		switch ($config['filesystem']) {
			case GalleryEnumeration::STORAGE:
				return StorageHelper::deleteDirectory($dir);
				break;
			case GalleryEnumeration::FTP:
				return FtpHelper::deleteDirectory($dir);
				break;
			case GalleryEnumeration::LOCAL:
				return LocalHelper::deleteDirectory($dir);
				break;
			default:
				return false;
		}
	}
	
	/**
	 * Rename file
	 *
	 * @param string $old_path File to rename
	 * @param string $name New file name without extension
	 * @return bool
	 * @throws FtpException
	 */
	public static function renameFile($old_path, $name)
	{
		$config = self::getConfig();
		
		$name = self::fixFileName($name);
		
		$info = pathinfo($old_path);
		
		$extension = array_key_exists('extension', $info) ? $info['extension'] : '';
		
		$new_path = $info['dirname'] . "/" . $name . "." . $extension;
		
		switch ($config['filesystem']) {
			case GalleryEnumeration::STORAGE:
				return StorageHelper::renameFile($old_path, $new_path) ? $new_path : false;
				break;
			case GalleryEnumeration::FTP:
				return FtpHelper::renameFile($old_path, $new_path);
				break;
			case GalleryEnumeration::LOCAL:
				return LocalHelper::renameFile($old_path, $new_path, $info, $name);
				break;
			default:
				return false;
		}
	}
	
	/**
	 * Deletes the specific file
	 *
	 * @param string $path
	 * @param string $path_thumb
	 * @return null
	 * @throws FtpException
	 */
	public static function deleteFile($path, $path_thumb)
	{
		$config = self::getConfig();
		if ($config['delete_files']) {
			$file = File::with('fileables')->where('path', $path)->first();
			if (!CheckHelper::isNotEmptyArray($file->fileables ?? [])) {
				switch ($config['filesystem']) {
					case GalleryEnumeration::STORAGE:
						StorageHelper::deleteFile($path);
						break;
					case GalleryEnumeration::FTP:
						FtpHelper::deleteFile($path);
						break;
					case GalleryEnumeration::LOCAL:
						LocalHelper::deleteFile($path);
						break;
					default:
						return GalleryEnumeration::NO_FILESYSTEM;
				}
				return CheckHelper::isNotEmpty($file) ? $file->delete() : false;
			} else {
				return GalleryHelper::response('You cannot delete this item because it used in the application');
			}
		}
	}
	
	/**
	 * Convert convert size in bytes to human readable
	 *
	 * @param int $size
	 * @return  string
	 */
	public static function makeSize($size)
	{
		$units = array('B', 'KB', 'MB', 'GB', 'TB');
		$u = 0;
		while ((round($size / 1024) > 0) && ($u < 4)) {
			$size = $size / 1024;
			$u++;
		}
		return (number_format($size, 0) . " " . __($units[$u]));
	}
	
	/**
	 * Correct strtolower handling
	 *
	 * @param string $str
	 *
	 * @return  string
	 */
	public static function fixStrToLower($str)
	{
		if (function_exists('mb_strtoupper')) {
			return mb_strtolower($str);
		} else {
			return strtolower($str);
		}
	}
	
	/**
	 * Correct strtoupper handling
	 *
	 * @param $str
	 * @return bool|false|string|string[]|null
	 */
	public static function fixStrToUpper($str)
	{
		if (function_exists('mb_strtoupper')) {
			
			return mb_strtoupper($str);
			
		} else {
			
			return strtoupper($str);
			
		}
	}
	
	/**
	 * Determine directory size
	 *
	 * @param string $path
	 * @param bool $count_hidden
	 * @return array
	 */
	public static function folderInfo($path, $count_hidden = true)
	{
		$config = self::getConfig();
		
		$total_size = 0;
		
		$files = StorageHelper::scanDirectory();
		
		$cleanPath = rtrim($path, '/') . '/';
		
		$files_count = 0;
		
		$folders_count = 0;
		
		foreach ($files as $t) {
			
			if ($t != "." && $t != "..") {
				
				if ($count_hidden || !(in_array($t, $config['hidden_folders']) || in_array($t, $config['hidden_files']))) {
					
					$currentFile = $cleanPath . $t;
					
					if (is_dir($currentFile)) {
						
						list($size, $tmp, $tmp1) = self::folderInfo($currentFile, null);
						
						$total_size += $size;
						
						$folders_count++;
						
					} else {
						
						$size = filesize($currentFile);
						
						$total_size += $size;
						
						$files_count++;
						
					}
				}
				
			}
		}
		
		return array($total_size, $files_count, $folders_count);
	}
	
	/**
	 * Checks extension
	 *
	 * @param string $extension
	 * @return bool
	 */
	public static function checkExtension($extension)
	{
		$config = self::getConfig();
		
		$extension = GalleryHelper::fixStrToLower($extension);
		
		if ((!$config['ext_blacklist'] &&
				!in_array($extension, $config['ext'])) ||
			($config['ext_blacklist'] &&
				in_array($extension, $config['ext_blacklist']))) {
			
			return false;
			
		}
		
		return true;
	}
	
	/**
	 * Create new image from existing file
	 *
	 * @param string $imgfile Source image file name
	 * @param string $imgthumb Thumbnail file name
	 * @param int $newwidth Thumbnail width
	 * @param int $newheight Optional thumbnail height
	 * @param string $option Type of resize
	 * @return bool
	 * @throws FtpException
	 */
	public static function createImg($imgfile, $imgthumb, $newwidth, $newheight = null, $option = "crop")
	{
		$config = self::getConfig();
		
		$ftp = self::ftpConnection($config);
		
		$result = false;
		
		if (isset($config['ftp_host']) && $config['ftp_host']) {
			
			if (self::urlExists($imgfile)) {
				
				$temp = @tempnam('/tmp', 'RF');
				
				unlink($temp);
				
				$temp .= "." . substr(strrchr($imgfile, '.'), 1);
				
				$handle = fopen($temp, "w");
				
				fwrite($handle, @file_get_contents($imgfile));
				
				fclose($handle);
				
				$imgfile = $temp;
				
				$save_ftp = $imgthumb;
				
				$imgthumb = $temp;
				
			}
		}
		
		if (file_exists($imgfile) || strpos($imgfile, 'http') === 0) {
			
			if (strpos($imgfile, 'http') === 0 || GalleryHelper::imageCheckMemoryUsage($imgfile, $newwidth, $newheight)) {
				
				try {
					$magicianObj = new ImageLibraryService($imgfile);
					
					$magicianObj->resizeImage($newwidth, $newheight, $option);
					
					$magicianObj->saveImage($imgthumb, 80);
					
				} catch (Exception $e) {
					
					return $e->getMessage();
					
				}
				
				$result = true;
			}
		}
		
		if ($result && isset($config['ftp_host']) && $config['ftp_host']) {
			
			$ftp->put($save_ftp, $imgthumb, FTP_BINARY);
			
			unlink($imgthumb);
		}
		
		
		return $result;
	}
	
	/**
	 * Returns extensions from mime
	 *
	 * @param $mime
	 * @return mixed|string
	 */
	public static function getExtensionFromMime($mime)
	{
		$mime_types = self::getConfig('mime_types');
		if (strpos($mime, ';') !== FALSE) {
			$mime = substr($mime, 0, strpos($mime, ';'));
		}
		if (isset($mime_types[$mime])) {
			return $mime_types[$mime];
		}
		return '';
	}
	
	/**
	 * Returns file's mime type
	 *
	 * @param $filename
	 * @param bool $debug
	 * @return array|mixed|string
	 */
	public static function getFileMimeType($filename, $debug = false)
	{
		if (function_exists('finfo_open') && function_exists('finfo_file') && function_exists('finfo_close')) {
			$fileinfo = finfo_open(FILEINFO_MIME_TYPE);
			$mime_type = finfo_file($fileinfo, $filename);
			finfo_close($fileinfo);
			if (!empty($mime_type)) {
				if (true === $debug) {
					return array('mime_type' => $mime_type, 'method' => 'fileinfo');
				}
				return $mime_type;
			}
		}
		if (function_exists('mime_content_type')) {
			$mime_type = mime_content_type($filename);
			if (!empty($mime_type)) {
				
				if (true === $debug) {
					
					return array('mime_type' => $mime_type, 'method' => 'mime_content_type');
					
				}
				
				return $mime_type;
			}
		}
		
		$mime_types = self::getConfig('mime_types');
		
		$mime_types = array_flip($mime_types);
		
		$tmp_array = explode('.', $filename);
		
		$ext = strtolower(array_pop($tmp_array));
		
		if (!empty($mime_types[$ext])) {
			
			if (true === $debug) {
				
				return array('mime_type' => $mime_types[$ext], 'method' => 'from_array');
				
			}
			
			return $mime_types[$ext];
			
		}
		
		if (true === $debug) {
			
			return array('mime_type' => 'application/octet-stream', 'method' => 'last_resort');
			
		}
		
		return 'application/octet-stream';
	}
	
	/**
	 * Make a file copy
	 *
	 * @param string $old_path
	 * @param string $name New file name without extension
	 * @return  bool
	 * @throws FtpException
	 */
	public static function duplicateFile($old_path, $name)
	{
		$config = self::getConfig();
		$info = pathinfo($old_path);
		$new_path = $info['dirname'] . "/" . $name . "." . $info['extension'];
		$new_path = str_replace(' ', '', $new_path);
		switch ($config['filesystem']) {
			case GalleryEnumeration::STORAGE:
				return StorageHelper::duplicateFile($old_path, $new_path);
				break;
			case GalleryEnumeration::FTP:
				return FtpHelper::duplicateFile($old_path, $new_path, $info, $name);
				break;
			case GalleryEnumeration::LOCAL:
				return LocalHelper::duplicateFile($old_path, $new_path);
				break;
			default:
				return GalleryEnumeration::NO_FILESYSTEM;
		}
	}
	
	/**
	 * Checks if the current folder size plus the added size is over the overall size limit
	 *
	 * @param int $sizeAdded
	 * @return  bool
	 */
	public static function checkResultingSize($sizeAdded)
	{
		$config = self::getConfig();
		
		if ($config['MaxSizeTotal'] !== false && is_int($config['MaxSizeTotal'])) {
			
			list($sizeCurrentFolder, $fileCurrentNum, $foldersCurrentCount) = GalleryHelper::folderInfo($config['current_path'], false);
			
			// overall size over limit
			if (($config['MaxSizeTotal'] * 1024 * 1024) < ($sizeCurrentFolder + $sizeAdded)) {
				
				return false;
				
			}
			
		}
		
		return true;
	}
	
	/**
	 * Copies recursively  everything
	 *
	 * @param string $source
	 * @param string $destination
	 * @param bool $is_rec
	 */
	public static function recursiveCopy($source, $destination, $is_rec = false)
	{
		if (is_dir($source)) {
			if ($is_rec === false) {
				$pinfo = pathinfo($source);
				$destination = rtrim($destination, '/') . DIRECTORY_SEPARATOR . $pinfo['basename'];
			}
			if (is_dir($destination) === false) {
				mkdir($destination, 0755, true);
			}
			$files = scandir($source);
			foreach ($files as $file) {
				if ($file != "." && $file != "..") {
					self::recursiveCopy($source . DIRECTORY_SEPARATOR . $file, rtrim($destination, '/') . DIRECTORY_SEPARATOR . $file, true);
				}
			}
		} else {
			if (file_exists($source)) {
				if (is_dir($destination) === true) {
					$pinfo = pathinfo($source);
					$dest2 = rtrim($destination, '/') . DIRECTORY_SEPARATOR . $pinfo['basename'];
				} else {
					$dest2 = $destination;
				}
				copy($source, $dest2);
			}
		}
	}
	
	/**
	 * It is test for dir/file writability properly
	 *
	 * @param string $dir
	 * @return  bool
	 */
	public static function isReallyWritable($dir)
	{
		$dir = rtrim($dir, '/');
		
		// linux, safe off
		if (DIRECTORY_SEPARATOR == '/' && @ini_get("safe_mode") == false) {
			
			return is_writable($dir);
			
		}
		
		// Windows, safe ON. (have to write a file :S)
		if (is_dir($dir)) {
			
			$dir = $dir . '/' . md5(mt_rand(1, 1000) . mt_rand(1, 1000));
			
			if (($fp = @fopen($dir, 'ab')) === false) {
				
				return false;
				
			}
			
			fclose($fp);
			
			@chmod($dir, 0755);
			
			@unlink($dir);
			
			return true;
			
		} elseif (!is_file($dir) || ($fp = @fopen($dir, 'ab')) === false) {
			
			return false;
			
		}
		
		fclose($fp);
		
		return true;
	}
	
	/**
	 * Checks url exists or not via curl
	 *
	 * @param $url
	 * @return bool
	 */
	public static function urlExists($url)
	{
		$ftp = self::getFtp();
		if (!$ftp = curl_init($url)) return false;
		return true;
	}
	
	/**
	 * Check if a function is callable.
	 * Some servers disable copy,rename etc.
	 *
	 * @parm  string  $name
	 * @param $name
	 * @return  bool
	 */
	public static function isFunctionCallable($name)
	{
		if (function_exists($name) === false) {
			
			return false;
			
		}
		
		$disabled = explode(',', ini_get('disable_functions'));
		
		return !in_array($name, $disabled);
	}
	
	/**
	 * Renames recursively  everything
	 *
	 * I know copy and rename could be done with just one function
	 * but i split the 2 because sometimes rename fails on windows
	 * Need more feedback from users and refactor if needed
	 *
	 * @param string $source
	 * @param string $destination
	 * @param bool $is_rec
	 */
	public static function recursiveRename($source, $destination, $is_rec = false)
	{
		if (is_dir($source)) {
			
			if ($is_rec === false) {
				
				$pinfo = pathinfo($source);
				
				$destination = rtrim($destination, '/') . DIRECTORY_SEPARATOR . $pinfo['basename'];
				
			}
			
			if (is_dir($destination) === false) {
				
				mkdir($destination, 0755, true);
				
			}
			
			$files = scandir($source);
			
			foreach ($files as $file) {
				
				if ($file != "." && $file != "..") {
					
					self::recursiveRename($source . DIRECTORY_SEPARATOR . $file, rtrim($destination, '/') . DIRECTORY_SEPARATOR . $file, true);
					
				}
				
			}
			
		} else {
			
			if (file_exists($source)) {
				
				if (is_dir($destination) === true) {
					
					$pinfo = pathinfo($source);
					
					$dest2 = rtrim($destination, '/') . DIRECTORY_SEPARATOR . $pinfo['basename'];
					
				} else {
					
					$dest2 = $destination;
					
				}
				
				rename($source, $dest2);
				
			}
		}
	}
	
	/**
	 * Recursive chmod
	 *
	 * @param string $source
	 * @param int $mode
	 * @param string $rec_option
	 * @param bool $is_rec
	 */
	public static function recursiveChmod($source, $mode, $rec_option = "none", $is_rec = false)
	{
		if ($rec_option == "none") {
			
			chmod($source, $mode);
			
		} else {
			
			if ($is_rec === false) {
				
				chmod($source, $mode);
				
			}
			
			$files = scandir($source);
			
			foreach ($files as $file) {
				
				if ($file != "." && $file != "..") {
					
					if (is_dir($source . DIRECTORY_SEPARATOR . $file)) {
						
						if ($rec_option == "folders" || $rec_option == "both") {
							
							chmod($source . DIRECTORY_SEPARATOR . $file, $mode);
							
						}
						
						self::recursiveChmod($source . DIRECTORY_SEPARATOR . $file, $mode, $rec_option, true);
						
					} else {
						
						if ($rec_option == "files" || $rec_option == "both") {
							
							chmod($source . DIRECTORY_SEPARATOR . $file, $mode);
							
						}
						
					}
				}
			}
		}
	}
	
	/**
	 * Return the caller location if set in config.php
	 *
	 * @return  bool
	 */
	public static function addErrorLocation()
	{
		if (GalleryEnumeration::DEBUG_ERROR_MESSAGE) {
			
			$pile = debug_backtrace();
			
			return " (@" . $pile[0]["file"] . "#" . $pile[0]["line"] . ")";
			
		}
		
		return '';
	}
	
	/**
	 * Response construction helper
	 *
	 * @param string $content
	 * @param int $statusCode
	 * @param array $headers
	 * @return mixed
	 */
	public
	static function response($content = '', $statusCode = 200, $headers = array())
	{
		$responseClass = class_exists('Illuminate\Http\Response') ? '\Illuminate\Http\Response' : '\App\Services\ResponseService';
		
		return new $responseClass($content, $statusCode, $headers);
	}
	
	/**
	 * TODO REFACTOR THIS!
	 *
	 * @param $targetPath
	 * @param $targetFile
	 * @param $name
	 * @param $current_path
	 *   relative_image_creation
	 *   relative_path_from_current_pos
	 *   relative_image_creation_name_to_prepend
	 *   relative_image_creation_name_to_append
	 *   relative_image_creation_width
	 *   relative_image_creation_height
	 *   relative_image_creation_option
	 *   fixed_image_creation
	 *   fixed_path_from_filemanager
	 *   fixed_image_creation_name_to_prepend
	 *   fixed_image_creation_to_append
	 *   fixed_image_creation_width
	 *   fixed_image_creation_height
	 *   fixed_image_creation_option
	 *
	 * @return bool
	 */
	public
	static function newThumbnailsCreation($targetPath, $targetFile, $name, $current_path)
	{
		$config = self::getConfig();
		
		//create relative thumbs
		$all_ok = true;
		
		$info = pathinfo($name);
		
		$info['filename'] = GalleryHelper::fixFileName($info['filename']);
		
		if ($config['relative_image_creation']) {
			
			foreach ($config['relative_path_from_current_pos'] as $k => $path) {
				
				if ($path != "" && $path[strlen($path) - 1] != "/") {
					
					$path .= "/";
					
				}
				
				if (!file_exists($targetPath . $path)) {
					
					GalleryHelper::createFolder($targetPath . $path, false);
					
				}
				
				if (!self::endsWith($targetPath, $path)) {
					
					if (!GalleryHelper::createImg($targetFile,
						$targetPath . $path . $config['relative_image_creation_name_to_prepend'][$k] . $info['filename'] . $config['relative_image_creation_name_to_append'][$k] . "." . $info['extension'],
						$config['relative_image_creation_width'][$k],
						$config['relative_image_creation_height'][$k],
						$config['relative_image_creation_option'][$k]
					)) {
						
						$all_ok = false;
						
					}
				}
			}
		}
		
		//create fixed thumbs
		if ($config['fixed_image_creation']) {
			
			foreach ($config['fixed_path_from_filemanager'] as $k => $path) {
				
				if ($path != "" && $path[strlen($path) - 1] != "/") {
					
					$path .= "/";
					
				}
				
				$base_dir = $path . substr_replace($targetPath, '', 0, strlen($current_path));
				
				if (!file_exists($base_dir)) {
					
					GalleryHelper::createFolder($base_dir, false);
					
				}
				
				if (!GalleryHelper::createImg($targetFile,
					$base_dir . $config['fixed_image_creation_name_to_prepend'][$k] . $info['filename'] . $config['fixed_image_creation_to_append'][$k] . "." . $info['extension'],
					$config['fixed_image_creation_width'][$k],
					$config['fixed_image_creation_height'][$k],
					$config['fixed_image_creation_option'][$k]
				)) {
					
					$all_ok = false;
					
				}
				
			}
		}
		
		return $all_ok;
	}
	
	/**
	 * Check is string is ended with needle
	 *
	 * @param string $haystack
	 * @param string $needle
	 *
	 * @return  bool
	 */
	public
	static function endsWith($haystack, $needle)
	{
		return $needle === "" || substr($haystack, -strlen($needle)) === $needle;
	}
	
	/**
	 * Gets file extension present in PHAR file
	 *
	 * @param string $phar
	 * @param array $files
	 * @param string $basepath
	 */
	public
	static function checkFilesExtensionsOnPhar($phar, &$files, $basepath)
	{
		foreach ($phar as $file) {
			
			if ($file->isFile()) {
				
				if (GalleryHelper::checkFileExtension($file->getExtension())) {
					
					$files[] = $basepath . $file->getFileName();
					
				}
				
			} else {
				
				if ($file->isDir()) {
					
					$iterator = new DirectoryIterator($file);
					
					self::checkFilesExtensionsOnPhar($iterator, $files, $basepath . $file->getFileName() . '/');
					
				}
				
			}
		}
	}
	
	/**
	 * @return false|string
	 */
	public
	static function tempdir()
	{
		$tempfile = @tempnam(sys_get_temp_dir(), '');
		
		if (file_exists($tempfile)) {
			
			unlink($tempfile);
			
		}
		
		mkdir($tempfile);
		
		if (is_dir($tempfile)) {
			
			return $tempfile;
			
		}
		
	}
	
	/**
	 * Gets number of files in a directory
	 *
	 * @param string $path
	 * @param bool $count_hidden
	 * @return  int
	 */
	public
	static function filesCount($path, $count_hidden = true)
	{
		$config = self::getConfig();
		
		$total_count = 0;
		
		$files = scandir($path);
		
		$cleanPath = rtrim($path, '/') . '/';
		
		foreach ($files as $t) {
			
			if ($t != "." && $t != "..") {
				
				if ($count_hidden or !(in_array($t, $config['hidden_folders']) or in_array($t, $config['hidden_files']))) {
					
					$currentFile = $cleanPath . $t;
					
					if (is_dir($currentFile)) {
						
						$size = self::filesCount($currentFile);
						
						$total_count += $size;
						
					} else {
						
						$total_count += 1;
						
					}
					
				}
			}
		}
		
		return $total_count;
	}
	
	/**
	 * Gets file extension present in directory
	 *
	 * @param string $path
	 * @param string $ext
	 */
	public
	static function checkFilesExtensionsOnPath($path, $ext)
	{
		if (!is_dir($path)) {
			
			$fileinfo = pathinfo($path);
			
			if (!in_array(mb_strtolower($fileinfo['extension']), $ext)) {
				
				unlink($path);
				
			}
			
		} else {
			
			$files = scandir($path);
			
			foreach ($files as $file) {
				
				self::checkFilesExtensionsOnPath(trim($path, '/') . "/" . $file, $ext);
				
			}
			
		}
	}
	
	/**
	 * Checks file extension
	 *
	 * @param string $extension
	 * @return bool
	 */
	public
	static function checkFileExtension($extension)
	{
		$config = self::getConfig();
		
		$check = false;
		
		if (!$config['ext_blacklist']) {
			
			$confExt = $conf['ext'] ?? null;
			
			if (in_array(mb_strtolower($extension), $confExt)) {
				
				$check = true;
				
			}
			
		} else {
			
			$confExtBlacklist = $conf['ext_blacklist'] ?? null;
			
			if (!in_array(mb_strtolower($extension), $confExtBlacklist)) {
				
				$check = true;
				
			}
			
		}
		
		if ($config['files_without_extension'] && $extension == '') {
			
			$check = true;
			
		}
		
		return $check;
	}
	
	/**
	 * Checks if memory is enough to process image
	 *
	 * @param string $img
	 * @param int $max_breedte
	 * @param int $max_hoogte
	 * @return bool
	 */
	public static function imageCheckMemoryUsage($img, $max_breedte, $max_hoogte)
	{
		if (file_exists($img)) {
			
			$K64 = 65536; // number of bytes in 64K
			
			$memory_usage = memory_get_usage();
			
			if (ini_get('memory_limit') > 0) {
				
				$mem = ini_get('memory_limit');
				
				$memory_limit = 0;
				
				if (strpos($mem, 'M') !== false) $memory_limit = abs(intval(str_replace(array('M'), '', $mem) * 1024 * 1024));
				
				if (strpos($mem, 'G') !== false) $memory_limit = abs(intval(str_replace(array('G'), '', $mem) * 1024 * 1024 * 1024));
				
				$image_properties = @getimagesize($img);
				
				$image_width = $image_properties[0];
				
				$image_height = $image_properties[1];
				
				if (isset($image_properties['bits']))
					
					$image_bits = $image_properties['bits'];
				
				else
					$image_bits = 0;
				
				$image_memory_usage = $K64 + ($image_width * $image_height * ($image_bits >> 3) * 2);
				
				$thumb_memory_usage = $K64 + ($max_breedte * $max_hoogte * ($image_bits >> 3) * 2);
				
				$memory_needed = abs(intval($memory_usage + $image_memory_usage + $thumb_memory_usage));
				
				if ($memory_needed > $memory_limit) {
					
					return false;
					
				}
				
			}
			
			return true;
			
		}
		
		return false;
		
	}
	
	/**
	 * Gets a remote file, using whichever mechanism is enabled
	 *
	 * @param string $url
	 * @return  bool|mixed|string
	 */
	public
	static function getFileByUrl($url)
	{
		if (ini_get('allow_url_fopen')) {
			
			$arrContextOptions = array(
				"ssl" => array(
					"verify_peer" => false,
					"verify_peer_name" => false,
				),
			);
			
			return file_get_contents($url, false, stream_context_create($arrContextOptions));
			
		}
		
		if (!function_exists('curl_version')) {
			
			return false;
			
		}
		
		$ch = curl_init();
		
		curl_setopt($ch, CURLOPT_HEADER, 0);
		
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		
		curl_setopt($ch, CURLOPT_URL, $url);
		
		$data = curl_exec($ch);
		
		curl_close($ch);
		
		return $data;
	}
	
	/**
	 * Checks session exists or not
	 * If session exists returns the session with given specific key
	 * If not create a new session with given specific key and value
	 *
	 * @param $key
	 * @param $value
	 * @return SessionManager|Store|mixed|void
	 */
	public static function getCheckedSession($key, $value)
	{
		return session()->has($key) ? session($key) : session()->put($key, $value);
	}
	
	/**
	 * Returns current url
	 *
	 * @param $filter
	 * @param $sort_by
	 * @param $descending
	 * @param $baseUrl
	 * @return string|string[]
	 */
	public static function getCurrentUrl($filter, $sort_by, $descending, $baseUrl)
	{
		return str_replace(array('&filter=' . $filter, '&sort_by=' . $sort_by, '&descending=' . intval($descending)), array(''), $baseUrl . htmlspecialchars($_SERVER['REQUEST_URI']));
	}
	
	/**
	 * @param $data
	 * @param $action
	 * @param $path
	 * @return bool|void
	 * @throws FtpException
	 */
	public static function pasteClipboard($data, $action, $path)
	{
		$config = self::getConfig();
		switch ($config['filesystem']) {
			case GalleryEnumeration::STORAGE:
				return StorageHelper::moveFile($data, $action, $path);
				break;
			case GalleryEnumeration::FTP:
				return FtpHelper::moveFile($data, $action, $path);
				break;
			case GalleryEnumeration::LOCAL:
				return LocalHelper::moveFile($data, $action, $path);
				break;
			default:
				return GalleryEnumeration::NO_FILESYSTEM;
		}
	}
}
