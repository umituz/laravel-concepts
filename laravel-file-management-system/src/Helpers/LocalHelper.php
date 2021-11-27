<?php

namespace Gallery\Helpers;

use Gallery\Services\UploadHandlerService;

/**
 * Class LocalHelper
 * @package Gallery\Helpers
 */
class LocalHelper
{
	/**
	 * Create directory for images and/or thumbnails to the local host
	 *
	 * @param null $path
	 * @param null $path_thumbs
	 * @return bool
	 */
	public static function createDirectory($path = null, $path_thumbs = null)
	{
		$config = GalleryHelper::getConfig();
//		if (!is_null($path_thumbs)) {
//			$path_thumbs = self::fixPath($path_thumbs);
//		}
		$oldumask = umask(0);
		$permission = isset($config['folderPermission']) ? $config['folderPermission'] : 0755;
		if ($path && !file_exists($path)) {
			mkdir($path, $permission, true);
			// or even 01777 so you get the sticky bit set
		}
//		if (file_exists($path) || file_exists($path_thumbs)) {
//			return false;
//		}
//		if ($path_thumbs && !file_exists($path_thumbs)) {
//			mkdir($path_thumbs, $permission, true) or die("$path_thumbs cannot be found");
//		}
		// or even 01777 so you get the sticky bit set
		umask($oldumask);
		return true;
	}
	
	/**
	 * Deletes the specific directory from the local host
	 *
	 * @param $directory
	 * @return bool
	 */
	public static function deleteDirectory($directory)
	{
		if (!file_exists($directory) || GalleryHelper::isUploadDir($directory)) {
			return false;
		}
		if (!is_dir($directory)) {
			return unlink($directory);
		}
		foreach (scandir($directory) as $item) {
			if ($item == '.' || $item == '..') {
				continue;
			}
			if (!self::deleteDirectory($directory . '/' . $item)) {
				return false;
			}
		}
		return rmdir($directory);
	}
	
	/**
	 * Renames the specific directory from the local host
	 *
	 * @param string $old_path Directory to rename
	 * @param $new_path
	 * @return bool
	 */
	public static function renameDirectory($old_path, $new_path)
	{
		if (file_exists($old_path) && is_dir($old_path) && !GalleryHelper::isUploadDir($old_path)) {
			if (file_exists($new_path) && $old_path == $new_path) {
				return false;
			}
			return rename($old_path, $new_path);
		}
	}
	
	/**
	 * Renames the specific file from the local host
	 *
	 * @param string $old_path Directory to rename
	 * @param $new_path
	 * @param $info
	 * @param $name
	 * @return bool
	 */
	public static function renameFile($old_path, $new_path, $info, $name)
	{
		$old_path = public_path($old_path);
		if (file_exists($old_path) && is_file($old_path)) {
			$new_path = $info['dirname'] . "/" . $name . "." . $info['extension'];
			$new_path = public_path($new_path);
			if (file_exists($new_path) && $old_path == $new_path) {
				return false;
			}
			return rename($old_path, $new_path);
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
		if (file_exists($old_path) && is_file($old_path)) {
			if (file_exists($new_path) && $old_path == $new_path) {
				return false;
			}
			return copy($old_path, $new_path);
		}
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
		$config = GalleryHelper::getConfig();
		// check for writability
		if (GalleryHelper::isReallyWritable($path) === false
//			|| GalleryHelper::isReallyWritable($path_thumb) === false
		) {
			GalleryHelper::response(trans('Dir_No_Write') . '<br/>' . str_replace('../', '', $path) . '<br/>' .
//				str_replace('../', '', $path_thumb) .
				GalleryHelper::addErrorLocation())->send();
			exit;
		}
		// check if server disables copy or rename
		if (GalleryHelper::isFunctionCallable(($action == 'copy' ? 'copy' : 'rename')) === false) {
			GalleryHelper::response(sprintf(trans('Function_Disabled'), ($action == 'copy' ? (__('Copy')) : (__('Cut')))) . GalleryHelper::addErrorLocation())->send();
			exit;
		}
		if ($action == 'copy') {
			list($sizeFolderToCopy, $fileNum, $foldersCount) = GalleryHelper::folderInfo($path, false);
			if (!GalleryHelper::checkResultingSize($sizeFolderToCopy)) {
				GalleryHelper::response(sprintf(trans('max_size_reached'), $config['MaxSizeTotal']) . GalleryHelper::addErrorLocation())->send();
				exit;
			}
			GalleryHelper::recursiveCopy($data['path'], $path);
//                GalleryHelper::recursiveCopy(($data['path_thumb'], $path_thumb);
			return true;
		} elseif ($action == 'cut') {
			GalleryHelper::recursiveRename($data['path'], $path);
//			GalleryHelper::recursiveRename($data['path_thumb'], $path_thumb);
			// cleanup
			if (is_dir($data['path']) === TRUE) {
				self::recursiveRenameAfterCleaner($data['path']);
//				GalleryHelper::recursiveRenameAfterCleaner($data['path_thumb']);
			}
			return true;
		}
	}
	
	/**
	 * On windows rename leaves folders sometime
	 * This will clear leftover folders
	 * After more feedback will merge it with rrename
	 * @param $source
	 * @return bool
	 */
	public static function recursiveRenameAfterCleaner($source)
	{
		$files = scandir($source);
		foreach ($files as $file) {
			if ($file != "." && $file != "..") {
				if (is_dir($source . DIRECTORY_SEPARATOR . $file)) {
					self::recursiveRenameAfterCleaner($source . DIRECTORY_SEPARATOR . $file);
				} else {
					unlink($source . DIRECTORY_SEPARATOR . $file);
				}
			}
		}
		return rmdir($source);
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
		$config = GalleryHelper::getConfig();
		
		// no file
		if (!file_exists($path)) {
			GalleryHelper::response(__('File Not Found') . GalleryHelper::addErrorLocation())->send();
			exit;
		}
		// not writable or edit not allowed
		if (!is_writable($path) || $config['edit_text_files'] === false) {
			GalleryHelper::response(sprintf(trans('File_Open_Edit_Not_Allowed'), strtolower(trans('Edit'))) . GalleryHelper::addErrorLocation())->send();
			exit;
		}
		if (!GalleryHelper::checkResultingSize(strlen($content))) {
			GalleryHelper::response(sprintf(trans('max_size_reached'), $config['MaxSizeTotal']) . GalleryHelper::addErrorLocation())->send();
			exit;
		}
		if (@file_put_contents($path, $content) === false) {
			GalleryHelper::response(trans('File_Save_Error') . GalleryHelper::addErrorLocation())->send();
			exit;
		} else {
			GalleryHelper::response(__('Successfully Changed'))->send();
			exit;
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
		if (@file_put_contents($path, $content) === false) {
			GalleryHelper::response(trans('File_Save_Error') . GalleryHelper::addErrorLocation())->send();
			exit;
		} else {
//				@todo file_exists
//				if (file_exists($path . $name)) {
//					GalleryHelper::response(__('Rename Existing File') . GalleryHelper::addErrorLocation())->send();
//					exit;
//				}
			if (GalleryHelper::isFunctionCallable('chmod') !== false) {
				chmod($path, 0644);
			}
			GalleryHelper::response(__('File Saved Successfully'))->send();
		}
	}
	
	/**
	 * @param $uploadConfig
	 * @param $messages
	 * @return bool
	 */
	public static function uploadFile($uploadConfig, $messages)
	{
		new UploadHandlerService($uploadConfig, true, $messages);
		return true;
	}
	
	/**
	 * Deletes the specific file
	 *
	 * @param $path
	 * @return bool
	 */
	public static function deleteFile($path)
	{
		$path = public_path($path);
		
		if (file_exists($path)) {
			
			return unlink($path);
			
		}

//            if (file_exists($path_thumb)) {
//                unlink($path_thumb);
//            }

//            }

//				$info = pathinfo($path);

//				if (!$ftp && $config['relative_image_creation']) {
//
//					foreach ($config['relative_path_from_current_pos'] as $k => $path) {
//
//						if ($path != "" && $path[strlen($path) - 1] != "/") $path .= "/";
//
//						if (file_exists($info['dirname'] . "/" . $path . $config['relative_image_creation_name_to_prepend'][$k] . $info['filename'] . $config['relative_image_creation_name_to_append'][$k] . "." . $info['extension'])) {
//
//							unlink($info['dirname'] . "/" . $path . $config['relative_image_creation_name_to_prepend'][$k] . $info['filename'] . $config['relative_image_creation_name_to_append'][$k] . "." . $info['extension']);
//
//						}
//					}
//				}

//				if (!$ftp && $config['fixed_image_creation']) {
//
//					foreach ($config['fixed_path_from_filemanager'] as $k => $path) {
//
//						if ($path != "" && $path[strlen($path) - 1] != "/") $path .= "/";
//
//						$base_dir = $path . substr_replace($info['dirname'] . "/", '', 0, strlen($config['current_path']));
//
//						if (file_exists($base_dir . $config['fixed_image_creation_name_to_prepend'][$k] . $info['filename'] . $config['fixed_image_creation_to_append'][$k] . "." . $info['extension'])) {
//
//							unlink($base_dir . $config['fixed_image_creation_name_to_prepend'][$k] . $info['filename'] . $config['fixed_image_creation_to_append'][$k] . "." . $info['extension']);
//
//						}
//					}
//				}
	}
}