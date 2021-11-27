<?php

namespace Gallery\Helpers;

use Gallery\Services\FtpClient;
use Gallery\Services\FtpException;
use Gallery\Services\UploadHandlerService;
use Illuminate\Config\Repository;

/**
 * Class FtpHelper
 * @package Gallery\Helpers
 */
class FtpHelper
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
	 * FtpHelper constructor.
	 * @throws FtpException
	 */
	public function __construct()
	{
		$this->config = config('gallery');
		$this->ftp = false;
		$this->ftp = $this->ftpConnection($this->config);
	}
	
	/**
	 * Returns ftp property of this class
	 *
	 * @return Repository|mixed
	 * @throws FtpException
	 */
	public static function getFtp()
	{
		return (new self)->ftp;
	}
	
	/**
	 * Connects the ftp host connection
	 *
	 * @param $config
	 * @return FtpClient|bool
	 * @throws FtpException
	 */
	public static function ftpConnection($config)
	{
		if (isset($config['ftp_host']) && $config['ftp_host']) {
			$ftp = new FtpClient();
			try {
				$ftp->connect($config['ftp_host'], $config['ftp_ssl'], $config['ftp_port']);
				$ftp->login($config['ftp_user'], $config['ftp_pass']);
				$ftp->pasv(true);
				return $ftp;
			} catch (FtpException $e) {
				echo __('Error') . ' : ';
				echo $e->getMessage();
				echo __('Server') . " : ";
				$tmp = $e->getTrace();
				echo $tmp[0]['args'][0];
				echo "<br/>" . __('Please Check Configurations');
				die();
			}
		} else {
			return false;
		}
	}
	
	/**
	 * Create directory for images and/or thumbnails to the ftp host
	 *
	 * @param null $path
	 * @param null $path_thumbs
	 * @return string
	 */
	public static function createDirectory($path = null, $path_thumbs = null)
	{
		return "ftp will be included later";
	}
	
	/**
	 * Deletes the specific directory from the ftp host
	 *
	 * @param $directory
	 * @return bool|null
	 * @throws FtpException
	 */
	public static function deleteDirectory($directory)
	{
		$ftp = self::getFtp();
		try {
			$ftp->rmdir($directory);
			return true;
		} catch (FtpException $e) {
			return null;
		}
	}
	
	/**
	 * Renames the specific directory from the ftp host
	 *
	 * @param string $old_path Directory to rename
	 * @param $new_path
	 * @return bool
	 * @throws FtpException
	 */
	public static function renameDirectory($old_path, $new_path)
	{
		$ftp = self::getFtp();
		if ($ftp->chdir("/" . $old_path)) {
			if (@$ftp->chdir($new_path)) {
				return false;
			}
			return $ftp->rename("/" . $old_path, "/" . $new_path);
		}
	}
	
	/**
	 * Renames the specific file from the ftp host
	 *
	 * @param string $old_path Directory to rename
	 * @param $new_path
	 * @return bool
	 * @throws FtpException
	 */
	public static function renameFile($old_path, $new_path)
	{
		$ftp = self::getFtp();
		try {
			return $ftp->rename("/" . $old_path, "/" . $new_path);
		} catch (FtpException $e) {
			return false;
		}
	}
	
	/**
	 * Duplicates the file
	 *
	 * @param $old_path
	 * @param $new_path
	 * @param $info
	 * @param $name
	 * @return bool|null
	 * @throws FtpException
	 */
	public static function duplicateFile($old_path, $new_path, $info, $name)
	{
		$ftp = self::getFtp();
		try {
			$tmp = time() . $name . "." . $info['extension'];
			$ftp->get($tmp, "/" . $old_path);
			$ftp->put("/" . $new_path, $tmp, FTP_BINARY);
			unlink($tmp);
			return true;
		} catch (FtpException $e) {
			return null;
		}
	}
	
	/**
	 * Copies or cuts file to according to request action
	 *
	 * @param $data
	 * @param $action
	 * @param $path
	 * @return bool
	 * @throws FtpException
	 */
	public static function moveFile($data, $action, $path)
	{
		$ftp = self::getFtp();
		if ($action == 'copy') {
			$tmp = time() . basename($data['path']);
			$ftp->get($tmp, $data['path']);
			$ftp->put(DIRECTORY_SEPARATOR . $path, $tmp, FTP_BINARY);
			unlink($tmp);
//			if (GalleryHelper::urlExists($data['path_thumb'])) {
//				$tmp = time() . basename($data['path_thumb']);
//				@$ftp->get($tmp, $data['path_thumb']);
//				@$ftp->put(DIRECTORY_SEPARATOR . $path_thumb, $tmp, FTP_BINARY);
//				unlink($tmp);
//			}
			return true;
		} elseif ($action == 'cut') {
			$ftp->rename($data['path'], DIRECTORY_SEPARATOR . $path);
//			if (GalleryHelper::urlExists($data['path_thumb'])) {
//				@$ftp->rename($data['path_thumb'], DIRECTORY_SEPARATOR . $path_thumb);
//			}
			return true;
		}
	}
	
	/**
	 * Saves text file
	 *
	 * @param $path
	 * @param $content
	 * @return mixed
	 * @throws FtpException
	 */
	public static function saveTextFile($path, $content)
	{
		$ftp = self::getFtp();
		$tmp = time();
		file_put_contents($tmp, $content);
		$ftp->put("/" . $path, $tmp);
		unlink($tmp);
		return GalleryHelper::response(trans('File_Save_OK'))->send();
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
		return "ftp will be included later";
	}
	
	/**
	 * Uploads a new file
	 *
	 * @param $path
	 * @param $content
	 * @param $messages
	 * @return bool
	 * @throws FtpException
	 */
	public static function uploadFile($path, $content, $messages)
	{
		$config = GalleryHelper::getConfig();
		$ftp = self::getFtp();
		if (!is_dir($config['ftp_temp_folder'])) {
			mkdir($config['ftp_temp_folder'], $config['folderPermission'], true);
		}
		if (!is_dir($config['ftp_temp_folder'] . "thumbs")) {
			mkdir($config['ftp_temp_folder'] . "thumbs", $config['folderPermission'], true);
		}
		$uploadConfig['upload_dir'] = $config['ftp_temp_folder'];
		new UploadHandlerService($uploadConfig, true, $messages);
		$ftp->put($path, $content, FTP_BINARY);
		return true;
	}
	
	/**
	 * Deletes the specific file
	 *
	 * @param $path
	 * @return
	 * @throws FtpException
	 */
	public static function deleteFile($path)
	{
		$ftp = self::getFtp();
		return @$ftp->delete("/" . $path);
	}
}