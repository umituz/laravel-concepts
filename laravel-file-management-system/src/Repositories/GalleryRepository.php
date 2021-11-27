<?php

namespace Gallery\Repositories;

use Gallery\Enumerations\GalleryEnumeration;
use Gallery\Helpers\FtpHelper;
use Gallery\Helpers\GalleryHelper;
use Gallery\Helpers\HtmlHelper;
use Gallery\Entities\File;
use Gallery\Helpers\LocalHelper;
use Gallery\Helpers\StorageHelper;
use Gallery\Services\FtpClient;
use Gallery\Services\FtpException;
use Gallery\Http\Traits\GalleryDetailTrait;
use Exception;
use Illuminate\Config\Repository;
use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Contracts\View\Factory;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use LaravelHelper\Helpers\CheckHelper;
use LaravelHelper\Helpers\FileHelper;
use LaravelHelper\Helpers\SecurityHelper;
use PharData;

/**
 * Class GalleryRepository
 * @package Gallery\Repositories
 */
class GalleryRepository
{
	use GalleryDetailTrait;
	
	/**
	 * @var Repository
	 */
	private $config;
	
	/**
	 * @var FtpClient|bool
	 */
	private $ftp;
	
	/**
	 * @var Filesystem
	 */
	private $disk;
	
	/**
	 * GalleryRepository constructor.
	 */
	public function __construct()
	{
		$this->config = config('gallery');
	}
	
	/**
	 * Returns ftp property
	 *
	 * @return bool|FtpClient|void
	 * @throws FtpException
	 */
	public function getFtp()
	{
		return $this->ftp = FtpHelper::ftpConnection($this->config);
	}
	
	/**
	 * Returns disk property
	 *
	 * @return Filesystem
	 */
	public function getDisk()
	{
		$storage = $this->config['storage_brand'];
		
		if (!empty($storage)) {
			
			return $this->disk = Storage::disk($storage);
			
		}
	}
	
	/**
	 * Gallery page
	 *
	 * @return Factory|View
	 * @throws FtpException
	 */
	public function index()
	{
		$this->getSessionVerify();
		
		$this->requestHasNotType();
		
		$this->sessionHasSortBy();
		
		$this->sessionHasDescending();
		
		return view('laravel-gallery::index', $this->willBeSharedData());
	}
	
	/**
	 * Returns the variables to pass from controller to view.
	 *
	 * @return array
	 * @throws FtpException
	 */
	public function willBeSharedData()
	{
		
		return $this->necessaryVariables();
	}
	
	
	/**
	 * Returns necessary variables for gallery
	 *
	 * @return array
	 * @throws FtpException
	 */
	private function necessaryVariables()
	{
		$class_ext = '';
		
		$src = '';
		
		$tmp_path = '';
		
		$file_prevent_rename = false;
		
		$file_prevent_delete = false;
		
		$files_prevent_duplicate = array();
		
		$link = route('gallery.index', $this->getParams());
		
		$subdirReturn = $this->subDir();
		
		$bc = explode("/", $subdirReturn['subdir']);
		
		$ftpVariables = $this->ftpVariables();
		
		$fileVariables = $this->files();
		
		return [
			'config' => $this->config,
			'subdir_path' => $subdirReturn['subdir_path'],
			'subdir' => $subdirReturn['subdir'],
			'class_ext' => $class_ext,
			'src' => $src,
			'link' => $link,
			'tmp_path' => $tmp_path,
			'bc' => $bc,
			'file_prevent_rename' => $file_prevent_rename,
			'file_prevent_delete' => $file_prevent_delete,
			'files_prevent_duplicate' => $files_prevent_duplicate,
			'editor' => $this->requestHasEditor(),
			'descending' => $this->requestHasDescending(),
			'sort_by' => $this->requestHasSortBy(),
			'filter' => $this->requestHasFilter(),
			'callback' => $this->requestHasCallback(),
			'multiple' => $this->requestHasMultiple(),
			'popup' => $this->requestHasPopup(),
			'crossdomain' => $this->requestHasCrossDomain(),
			'field_id' => $this->requestHasFieldId(),
			'extensions' => $this->requestHasExtensions(),
			'return_relative_url' => $this->requestHasRelativeUrl(),
			'type_param' => $this->getTypeParam(),
			'apply_type' => $this->getApplyType(),
			'get_params' => $this->getParams(),
			'apply' => $this->getApply(),
			'view' => $this->requestHasView(),
			'rfm_subfolder' => $this->rfmSubFolder(),
			'ftp' => false,
//			'ftp' => FtpHelper::ftpConnection($this->config),
			'cur_dir' => $ftpVariables['cur_dir'],
			'cur_dir_thumb' => $ftpVariables['cur_dir_thumb'],
			'thumbs_path' => $ftpVariables['thumbs_path'],
			'parent' => $ftpVariables['parent'],
			'n_files' => $fileVariables['n_files'] ?? '',
			'current_files_number' => $fileVariables['current_files_number'] ?? '',
			'current_folders_number' => $fileVariables['current_folders_number'] ?? '',
			'files' => $fileVariables['files'] ?? [],
			'directories' => $fileVariables['directories'] ?? [],
			'currentUrl' => $this->currentUrl(),
			'clipboardPath' => $this->hasClipboardPath()
		];
	}
	
	/**
	 * Create folder
	 */
	public function createFolder()
	{
		if ($this->config['create_folders']) {
			
			$name = request('name');
			
			$path = request('path');
			
			$name = GalleryHelper::fixFileName($name);
			
			$path_thumb = $path = $path . $name;
			
			$res = GalleryHelper::createFolder($path, $path_thumb);
			
			if (!$res) {
				
				GalleryHelper::response(__('Rename Existing Folder') . GalleryHelper::addErrorLocation())->send();
				
			}
			
		}
		
	}
	
	/**
	 * Rename Folder
	 */
	public function renameFolder()
	{
		$path = request('path');
		$name = request('name');
		if ($this->config['rename_folders']) {
//			if (!is_dir($path)) {
//				GalleryHelper::response(__('Wrong Path') . GalleryHelper::addErrorLocation())->send();
//				exit;
//			}
			$name = str_replace('.', '', $name);
			if (isset($name) && !empty($name)) {
				if (!GalleryHelper::renameFolder($path, $name)) {
					GalleryHelper::response(__('Rename Existing Folder') . GalleryHelper::addErrorLocation())->send();
					exit;
				}
//                @TODO bu path_thumb lar nasıl çalışma mantığı var öğren
//                GalleryHelper::renameFolder($path_thumb, $name);
				
				if (!$this->getFtp() && $this->config['fixed_image_creation']) {
					
					foreach ($this->config['fixed_path_from_filemanager'] as $k => $paths) {
						
						if ($paths != "" && $paths[strlen($paths) - 1] != "/") {
							
							$paths .= "/";
							
						}
						
						$base_dir = $paths . substr_replace($path, '', 0, strlen($this->config['current_path']));
						
						GalleryHelper::renameFolder($base_dir, $name);
						
					}
					
				}
			} else {
				
				GalleryHelper::response(trans('Empty_name') . GalleryHelper::addErrorLocation())->send();
				
				exit;
				
			}
		}
	}
	
	/**
	 * Delete Folder
	 */
	public function deleteFolder()
	{
		if ($this->config['delete_folders']) {

//            @todo  THUMB MANTIĞI SONRAYA BIRAKILDI
			$path = request('path');
			
			GalleryHelper::deleteDir($path);
		}
	}
	
	/**
	 * Create file form html codes as the string
	 *
	 * @return string
	 */
	public function createFileForm()
	{
		return HtmlHelper::createFileForm($this->config['editable_text_file_exts']);
	}
	
	/**
	 * Create File
	 */
	public function createFile()
	{
		if ($this->config['create_text_files'] === false) {
			GalleryHelper::response(sprintf(trans('File_Open_Edit_Not_Allowed'), strtolower(trans('Edit'))) . GalleryHelper::addErrorLocation())->send();
			exit;
		}
		if (!isset($this->config['editable_text_file_exts']) || !is_array($this->config['editable_text_file_exts'])) {
			$this->config['editable_text_file_exts'] = array();
		}
		$path = request('path');
		$name = request('name');
		$content = request('new_content');
		// check if user supplied extension
		if (strpos($name, '.') === false) {
			GalleryHelper::response(trans('No_Extension') . ' ' . sprintf(trans('Valid_Extensions'), implode(', ', $this->config['editable_text_file_exts'])) . GalleryHelper::addErrorLocation())->send();
			exit;
		}
		$name = GalleryHelper::fixFileName($name);
		if (empty($name)) {
			GalleryHelper::response(__('Empty Name') . GalleryHelper::addErrorLocation())->send();
			exit;
		}
		// check extension
		$parts = explode('.', $name);
		if (!in_array(end($parts), $this->config['editable_text_file_exts'])) {
			GalleryHelper::response(trans('Error_extension') . ' ' . sprintf(trans('Valid_Extensions'), implode(', ', $this->config['editable_text_file_exts'])) . GalleryHelper::addErrorLocation(), 400)->send();
			exit;
		}
		if (!GalleryHelper::checkResultingSize(strlen($content))) {
			GalleryHelper::response(sprintf(trans('max_size_reached'), $this->config['MaxSizeTotal']) . GalleryHelper::addErrorLocation())->send();
			exit;
		}
		
		switch ($this->config['filesystem']) {
			case GalleryEnumeration::STORAGE:
				StorageHelper::createFile($path . $name, $content);
				break;
			case GalleryEnumeration::FTP:
				FtpHelper::createFile($path . $name, $content);
				break;
			case GalleryEnumeration::LOCAL:
				LocalHelper::createFile($path . $name, $content);
				break;
			default:
				return GalleryEnumeration::NO_FILESYSTEM;
		}
		
		// Store record to the database if database connection is true
		if ($this->config['database']['connection']) {
			$extension = last(explode('.', $name));
			$fullPath = $path . $name;
			File::updateOrCreate(
				['path' => $fullPath],
				[
					'path' => $fullPath,
					'mime_type' => $extension,
					'created_by' => auth()->user()->id ?? null
				]
			);
		}
	}
	
	/**
	 * View Type
	 */
	public function view()
	{
		if (request()->has('type')) {
			session()->put('RF.view_type', request('type'));
		} else {
			GalleryHelper::response(trans('view type number missing') . GalleryHelper::addErrorLocation())->send();
			exit;
		}
	}
	
	/**
	 * Upload File
	 */
	public function upload()
	{
		try {
			if (session('RF.verify') != GalleryEnumeration::VERIFICATION_CODE) {
				GalleryHelper::response(trans('forbidden') . GalleryHelper::addErrorLocation(), 403)->send();
				exit;
			}
			$ftp = FtpHelper::ftpConnection($this->config);
			if ($this->config['filesystem'] == GalleryEnumeration::STORAGE) {
				$source_base = $this->config['current_path'];
				$thumb_base = $this->config['thumbs_base_path'];
			} elseif ($this->config['filesystem'] == GalleryEnumeration::FTP) {
				$source_base = $this->config['ftp_base_folder'] . $this->config['upload_dir'];
				$thumb_base = $this->config['ftp_base_folder'] . $this->config['ftp_thumbs_dir'];
			} else {
				$source_base = $this->config['current_path'];
				$thumb_base = $this->config['thumbs_base_path'];
			}
			$fldr = request('fldr') ?? '/';
			if (request()->has('fldr')) {
				$fldr = str_replace('undefined', '', $fldr);
				$storeFolder = $source_base . $fldr;
				$storeFolderThumb = $thumb_base . $fldr;
			} else {
				return;
			}
			$fldr = rawurldecode(trim(strip_tags($fldr), "/") . "/");
			if (!GalleryHelper::checkRelativePath($fldr)) {
				GalleryHelper::response(trans('wrong path') . GalleryHelper::addErrorLocation())->send();
				exit;
			}
			$path = $storeFolder;
			$cycle = true;
			$max_cycles = 50;
			$i = 0;
			//GET config
			while ($cycle && $i < $max_cycles) {
				$i++;
				if ($path == $this->config['current_path']) {
					$cycle = false;
				}
				$path = GalleryHelper::fixDirname($path) . '/';
			}
			$messages = null;
			if (__("Upload_error_messages") !== "Upload_error_messages") {
				$messages = trans("Upload_error_messages");
			}
			// make sure the length is limited to avoid DOS attacks
			if (request()->has('url') && strlen(request('url')) < 2000) {
				$url = request('url');
				$urlPattern = '/^(https?:\/\/)?([\da-z\.-]+\.[a-z\.]{2,6}|[\d\.]+)([\/?=&#]{1}[\da-z\.-]+)*[\/\?]?$/i';
				if (preg_match($urlPattern, $url)) {
					$temp = @tempnam('/tmp', 'RF');
					$ch = curl_init($url);
					$fp = fopen($temp, 'wb');
					curl_setopt($ch, CURLOPT_FILE, $fp);
					curl_setopt($ch, CURLOPT_HEADER, 0);
					curl_exec($ch);
					if (curl_errno($ch)) {
						curl_close($ch);
						throw new Exception('Invalid URL');
					}
					curl_close($ch);
					fclose($fp);
					$_FILES['files'] = array(
						'name' => array(basename($_POST['url'])),
						'tmp_name' => array($temp),
						'size' => array(filesize($temp)),
						'type' => null
					);
				} else {
					throw new Exception('Is not a valid URL.');
				}
			}
			if ($this->config['mime_extension_rename']) {
				$info = pathinfo($_FILES['files']['name'][0]);
				$mime_type = $_FILES['files']['type'][0];
				if (function_exists('mime_content_type')) {
					$mime_type = mime_content_type($_FILES['files']['tmp_name'][0]);
				} elseif (function_exists('finfo_open')) {
					$finfo = finfo_open(FILEINFO_MIME_TYPE);
					$mime_type = finfo_file($finfo, $_FILES['files']['tmp_name'][0]);
				} else {
					$mime_type = GalleryHelper::getFileMimeType($_FILES['files']['tmp_name'][0]);
				}
				$extension = GalleryHelper::getExtensionFromMime($mime_type);
				if ($extension == 'so' || $extension == '' || $mime_type == "text/troff") {
					$extension = $info['extension'];
				}
				$filename = $info['filename'] . "." . $extension;
			} else {
				$filename = $_FILES['files']['name'][0];
			}
			$_FILES['files']['name'][0] = GalleryHelper::fixFileName($filename);
			if (!$_FILES['files']['type'][0]) {
				$_FILES['files']['type'][0] = $mime_type;
			}
			// LowerCase
			if ($this->config['lower_case']) {
				$_FILES['files']['name'][0] = GalleryHelper::fixStrToLower($_FILES['files']['name'][0]);
			}
//            if (!GalleryHelper::checkResultingSize($_FILES['files']['size'][0])) {
//                if (!isset($upload_handler->response['files'][0])) {
////                     Avoid " Warning: Creating default object from empty value ... "
//                    $upload_handler->response['files'][0] = new stdClass();
//                }
//                $upload_handler->response['files'][0]->error = sprintf(trans('max_size_reached'), $this->config['MaxSizeTotal']) . GalleryHelper::addErrorLocation();
//                echo json_encode($upload_handler->response);
//                exit();
//            }
			$uploadConfig = array(
				'config' => $this->config,
				'storeFolder' => $storeFolder,
				'storeFolderThumb' => $storeFolderThumb,
				'ftp' => $ftp,
				'upload_dir' => dirname($_SERVER['SCRIPT_FILENAME']) . '/' . $storeFolder,
				'upload_url' => $this->config['base_url'] . $this->config['upload_dir'] . $fldr,
				'mkdir_mode' => $this->config['folderPermission'],
				'max_file_size' => $this->config['MaxSizeUpload'] * 1024 * 1024,
				'correct_image_extensions' => true,
				'print_response' => false
			);
			if (!$this->config['ext_blacklist']) {
				$uploadConfig['accept_file_types'] = '/\.(' . implode('|', $this->config['ext']) . ')$/i';
				if ($this->config['files_without_extension']) {
					$uploadConfig['accept_file_types'] = '/((\.(' . implode('|', $this->config['ext']) . ')$)|(^[^.]+$))$/i';
				}
			} else {
				$uploadConfig['accept_file_types'] = '/\.(?!' . implode('|', $this->config['ext_blacklist']) . '$)/i';
				if ($this->config['files_without_extension']) {
					$uploadConfig['accept_file_types'] = '/((\.(?!' . implode('|', $this->config['ext_blacklist']) . '$))|(^[^.]+$))/i';
				}
			}
			$fl = request()->file('files');
			
			switch ($this->config['filesystem']) {
				case GalleryEnumeration::STORAGE:
					StorageHelper::uploadFile(
						request('fldr') . $fl[0]->getClientOriginalName(),
						file_get_contents($fl[0])
					);
					break;
				case GalleryEnumeration::FTP:
					FtpHelper::uploadFile(
						request('fldr') . $fl[0]->getClientOriginalName(),
						file_get_contents($fl[0]),
						$messages
					);
					break;
				case GalleryEnumeration::LOCAL:
					LocalHelper::uploadFile($uploadConfig, $messages);
					break;
				default:
					return GalleryEnumeration::NO_FILESYSTEM;
			}

//			@todo BURASI DÜZGÜNLEŞTİRİLECEK
			if ($this->config['database']['connection']) {
				$files = request('files');
				$fl = array();
				for ($i = 0; $i < count($files); $i++) {
					$fl = FileHelper::getFileDetail($files[$i], request('fldr'));
					if ($fl != []) {
						File::updateOrCreate(
							['path' => $fl['path']],
							$fl
						);
						echo json_encode(['message' => __('Successfully Added')]);
					} else {
						echo json_encode(['message' => __('File Not Found')]);
					}
				}
			}
//			return GalleryHelper::response(trans('Successfully') . GalleryHelper::addErrorLocation(), 201)->send();
		} catch (Exception $e) {
			$return = array();
			if (array_key_exists('files', $_FILES)) {
				foreach ($_FILES['files']['name'] as $i => $name) {
					$return[] = array(
						'name' => $name,
						'error' => $e->getMessage(),
						'size' => $_FILES['files']['size'][$i],
						'type' => $_FILES['files']['type'][$i]
					);
				}
				echo json_encode(array("files" => $return));
				return;
			}
			echo json_encode(array("error" => $e->getMessage()));
		}
	}
	
	/**
	 * File Download
	 */
	public function fileDownload()
	{
		if (session('RF.verify') != GalleryEnumeration::VERIFICATION_CODE) {
			GalleryHelper::response(trans('forbidden') . GalleryHelper::addErrorLocation(), 403)->send();
			exit;
		}
		if (!GalleryHelper::checkRelativePath(request('path')) || strpos(request('path'), '/') === 0) {
			GalleryHelper::response(trans('wrong path') . GalleryHelper::addErrorLocation(), 400)->send();
			exit;
		}
		if (strpos($_POST['name'], '/') !== false) {
			GalleryHelper::response(trans('wrong path') . GalleryHelper::addErrorLocation(), 400)->send();
			exit;
		}
		$ftp = $this->getFtp();
		$disk = $this->getDisk();
		if ($this->config['filesystem'] == GalleryEnumeration::STORAGE) {
			$path = $this->config['current_path'] . request('path');
		} elseif ($this->config['filesystem'] == GalleryEnumeration::FTP) {
			$path = $this->config['ftp_base_url'] . $this->config['upload_dir'] . request('path');
		} else {
			$path = $this->config['current_path'] . request('path');
		}
		$name = request('name');
		$info = pathinfo($name);
		if (!GalleryHelper::checkExtension($info['extension'])) {
			GalleryHelper::response(trans('wrong extension') . GalleryHelper::addErrorLocation(), 400)->send();
			exit;
		}
		$file_name = $info['basename'];
		$file_ext = $info['extension'];
		$file_path = $path . $name;
		// make sure the file exists
		if ($this->config['filesystem'] == GalleryEnumeration::STORAGE) {
			if ($disk->exists($name)) {
				header('Content-Type: application/octet-stream');
				header("Content-Transfer-Encoding: Binary");
				header("Content-disposition: attachment");
				header("Content-disposition: attachment; filename=\"" . $file_name . "\"");
				$disk->download($name);
			}
		} elseif ($this->config['filesystem'] == GalleryEnumeration::FTP) {
			header('Content-Type: application/octet-stream');
			header("Content-Transfer-Encoding: Binary");
			header("Content-disposition: attachment; filename=\"" . $file_name . "\"");
			readfile($file_path);
		} elseif (is_file($file_path) && is_readable($file_path)) {
			if (!file_exists($path . $name)) {
				GalleryHelper::response(trans('File_Not_Found') . GalleryHelper::addErrorLocation(), 404)->send();
				exit;
			}
			$size = filesize($file_path);
			$file_name = rawurldecode($file_name);
			if (function_exists('mime_content_type')) {
				$mime_type = mime_content_type($file_path);
			} elseif (function_exists('finfo_open')) {
				$finfo = finfo_open(FILEINFO_MIME_TYPE);
				$mime_type = finfo_file($finfo, $file_path);
			} else {
				$mime_type = GalleryHelper::getFileMimeType($file_path);
			}
			@ob_end_clean();
			if (ini_get('zlib.output_compression')) {
				ini_set('zlib.output_compression', 'Off');
			}
			header('Content-Type: ' . $mime_type);
			header('Content-Disposition: attachment; filename="' . $file_name . '"');
			header("Content-Transfer-Encoding: binary");
			header('Accept-Ranges: bytes');
			if (isset($_SERVER['HTTP_RANGE'])) {
				
				list($a, $range) = explode("=", $_SERVER['HTTP_RANGE'], 2);
				
				list($range) = explode(",", $range, 2);
				
				list($range, $range_end) = explode("-", $range);
				
				$range = intval($range);
				
				if (!$range_end) {
					
					$range_end = $size - 1;
					
				} else {
					
					$range_end = intval($range_end);
					
				}
				
				$new_length = $range_end - $range + 1;
				
				header("HTTP/1.1 206 Partial Content");
				
				header("Content-Length: $new_length");
				
				header("Content-Range: bytes $range-$range_end/$size");
				
			} else {
				
				$new_length = $size;
				
				header("Content-Length: " . $size);
				
			}
			
			$chunksize = 1 * (1024 * 1024);
			$bytes_send = 0;
			
			if ($file = fopen($file_path, 'r')) {
				if (isset($_SERVER['HTTP_RANGE'])) {
					fseek($file, $range);
				}
				
				while (!feof($file) &&
					(!connection_aborted()) &&
					($bytes_send < $new_length)
				) {
					$buffer = fread($file, $chunksize);
					echo $buffer;
					flush();
					$bytes_send += strlen($buffer);
				}
				fclose($file);
			} else {
				die('Error - can not open file.');
			}
			
			die();
			
		} else {
			
			// file does not exist
			header("HTTP/1.0 404 Not Found");
			
		}
		
		exit;
	}
	
	/**
	 * Renames file
	 *
	 * @return bool
	 * @throws FtpException
	 */
	public function renameFile()
	{
		if ($this->config['rename_files']) {
			$name = request('name');
			$path_thumb = $path = request('path');
			$name = GalleryHelper::fixFileName($name, $this->config);
			if (isset($name) && !empty($name)) {
				$new_path = GalleryHelper::renameFile($path, $name) ? GalleryHelper::renameFile($path, $name) : false;
				if ($new_path == false) {
					GalleryHelper::response(__('Rename Existing File') . GalleryHelper::addErrorLocation())->send();
					exit;
				}
//				GalleryHelper::renameFile($path_thumb, $name);
				if ($this->config['fixed_image_creation']) {
					$info = pathinfo($path);
					foreach ($this->config['fixed_path_from_filemanager'] as $k => $paths) {
						
						if ($paths != "" && $paths[strlen($paths) - 1] != "/") {
							$paths .= "/";
						}
						
						$base_dir = $paths . substr_replace($info['dirname'] . "/", '', 0, strlen($this->config['current_path']));
						
						if (file_exists($base_dir . $this->config['fixed_image_creation_name_to_prepend'][$k] . $info['filename'] . $this->config['fixed_image_creation_to_append'][$k] . "." . $info['extension'])) {
							GalleryHelper::renameFile($base_dir . $this->config['fixed_image_creation_name_to_prepend'][$k] . $info['filename'] . $this->config['fixed_image_creation_to_append'][$k] . "." . $info['extension'], $this->config['fixed_image_creation_name_to_prepend'][$k] . $name . $this->config['fixed_image_creation_to_append'][$k]);
						}
					}
				}
				if ($this->config['database']['connection']) {
					$file = File::where('path', $path)->first();
					return CheckHelper::isNotEmpty($file) ? $file->update(['path' => $new_path]) : false;
				}
			} else {
				GalleryHelper::response(trans('Empty_name') . GalleryHelper::addErrorLocation())->send();
				exit;
			}
		}
	}
	
	/**
	 * Delete File
	 */
	public function deleteFile()
	{
		$path_thumb = $path = request('path');
		return GalleryHelper::deleteFile($path, $path_thumb);
	}
	
	/**
	 * Delete Files
	 */
	public function deleteFiles()
	{
		$paths_thumb = $paths = request('paths');
		foreach ($paths as $key => $p) {
			GalleryHelper::deleteFile($p, $paths_thumb[$key]);
		}
	}
	
	/**
	 * Filter File
	 */
	public function filter()
	{
		if (request()->has('type')) {
			
			if (isset($this->config['remember_text_filter']) && $this->config['remember_text_filter']) {
				
				session()->put('RF.filter', request('type'));
				
			}
			
		} else {
			
			GalleryHelper::response(__('View type number missing') . GalleryHelper::addErrorLocation())->send();
			
			exit;
			
		}
	}
	
	/**
	 * Duplicates the file
	 *
	 * @throws FtpException
	 */
	public function duplicateFile()
	{
		if ($this->config['duplicate_files']) {
			$name = request('name');
			$path_thumb = $path = request('path');
			$name = GalleryHelper::fixFileName($name, $this->config);
			if (isset($name) && !empty($name)) {
//				$path = public_path($path);
//				if (!$this->getFtp() && !GalleryHelper::checkResultingSize(filesize($path))) {
//					GalleryHelper::response(sprintf(trans('max_size_reached'), $this->config['MaxSizeTotal']) . GalleryHelper::addErrorLocation())->send();
//					exit;
//				}
				if (!GalleryHelper::duplicateFile($path, $name)) {
					GalleryHelper::response(trans('Rename_existing_file') . GalleryHelper::addErrorLocation())->send();
					exit;
				}

//				GalleryHelper::duplicateFile($path_thumb, $name);

//				if (!$this->getFtp() && $this->config['fixed_image_creation']) {
//					$info = pathinfo($path);
//					foreach ($this->config['fixed_path_from_filemanager'] as $k => $paths) {
//						if ($paths != "" && $paths[strlen($paths) - 1] != "/") {
//							$paths .= "/";
//						}
//						$base_dir = $paths . substr_replace($info['dirname'] . "/", '', 0, strlen($this->config['current_path']));
//						if (file_exists($base_dir . $this->config['fixed_image_creation_name_to_prepend'][$k] . $info['filename'] . $this->config['fixed_image_creation_to_append'][$k] . "." . $info['extension'])) {
//							GalleryHelper::duplicateFile($base_dir . $this->config['fixed_image_creation_name_to_prepend'][$k] . $info['filename'] . $this->config['fixed_image_creation_to_append'][$k] . "." . $info['extension'],
//								$this->config['fixed_image_creation_name_to_prepend'][$k] . $name . $this->config['fixed_image_creation_to_append'][$k]
//							);
//						}
//					}
//				}
			} else {
				GalleryHelper::response(__('Empty Name') . GalleryHelper::addErrorLocation())->send();
				exit;
			}
		}
	}
	
	/**
	 * Copy cut file
	 */
	public function copyCutFile()
	{
		$subAction = request('sub_action');
		if ($subAction != 'copy' && $subAction != 'cut') {
			GalleryHelper::response(trans('wrong sub-action') . GalleryHelper::addErrorLocation())->send();
			exit;
		}
		if (trim(request('path')) == '') {
			GalleryHelper::response(__('No Path') . GalleryHelper::addErrorLocation())->send();
			exit;
		}
		$msg_sub_action = ($subAction == 'copy' ? __('Copy') : __('Cut'));
		$path = $this->config['current_path'] . request('path');
		if (is_dir($path)) {
			// can't copy/cut dirs
			if ($this->config['copy_cut_dirs'] === false) {
				GalleryHelper::response(sprintf(trans('Copy_Cut_Not_Allowed'), $msg_sub_action, trans('Folders')) . GalleryHelper::addErrorLocation())->send();
				exit;
			}
			list($sizeFolderToCopy, $fileNum, $foldersCount) = GalleryHelper::folderInfo($path, false);
			// size over limit
			if ($this->config['copy_cut_max_size'] !== false && is_int($this->config['copy_cut_max_size'])) {
				if (($this->config['copy_cut_max_size'] * 1024 * 1024) < $sizeFolderToCopy) {
					GalleryHelper::response(sprintf(trans('Copy_Cut_Size_Limit'), $msg_sub_action, $this->config['copy_cut_max_size']) . GalleryHelper::addErrorLocation())->send();
					exit;
				}
			}
			// file count over limit
			if ($this->config['copy_cut_max_count'] !== false && is_int($this->config['copy_cut_max_count'])) {
				if ($this->config['copy_cut_max_count'] < $fileNum) {
					GalleryHelper::response(sprintf(trans('Copy_Cut_Count_Limit'), $msg_sub_action, $this->config['copy_cut_max_count']) . GalleryHelper::addErrorLocation())->send();
					exit;
				}
			}
			if (!GalleryHelper::checkResultingSize($sizeFolderToCopy)) {
				GalleryHelper::response(sprintf(trans('max_size_reached'), $this->config['MaxSizeTotal']) . GalleryHelper::addErrorLocation())->send();
				exit;
			}
		} else {
			// can't copy/cut files
			if ($this->config['copy_cut_files'] === false) {
				GalleryHelper::response(sprintf(trans('Copy_Cut_Not_Allowed'), $msg_sub_action, trans('Files')) . GalleryHelper::addErrorLocation())->send();
				exit;
			}
		}
		session()->put('RF.clipboard.path', request('path'));
		session()->put('RF.clipboard_action', $subAction);
	}
	
	/**
	 * Paste clipboard
	 */
	public function pasteClipboard()
	{
		$path = request('path');
		$path_thumb = request('path');
		
		if (!session()->has('RF.clipboard_action') && !session()->has('RF.clipboard.path')
			|| session('RF.clipboard_action') == ''
			|| session('RF.clipboard.path') == '') {
			GalleryHelper::response()->send();
			exit;
		}
		
		$action = session('RF.clipboard_action');
		$data = session('RF.clipboard');
		
		if ($this->getFtp()) {
			
			if (request('path') != "") {
				$path .= DIRECTORY_SEPARATOR;
				$path_thumb .= DIRECTORY_SEPARATOR;
			}
			
			$path_thumb .= basename($data['path']);
			
			$path .= basename($data['path']);
			
			$data['path_thumb'] = DIRECTORY_SEPARATOR . $this->config['ftp_base_folder'] . $this->config['ftp_thumbs_dir'] . $data['path'];
			
			$data['path'] = DIRECTORY_SEPARATOR . $this->config['ftp_base_folder'] . $this->config['upload_dir'] . $data['path'];
			
		} else {
			
			$data['path_thumb'] = $this->config['thumbs_base_path'] . $data['path'];
			
			$data['path'] = $this->config['current_path'] . $data['path'];
			
		}
		
		$pinfo = pathinfo($data['path']);
		
		// user wants to paste to the same dir. nothing to do here...
		if ($pinfo['dirname'] == rtrim($path, DIRECTORY_SEPARATOR)) {
			GalleryHelper::response()->send();
			exit;
		}
		
		// user wants to paste folder to it's own sub folder.. baaaah.
		if (is_dir($data['path']) && strpos($path, $data['path']) !== false) {
			GalleryHelper::response()->send();
			exit;
		}
		
		// something terribly gone wrong
		if ($action != 'copy' && $action != 'cut') {
			GalleryHelper::response(trans('wrong action') . GalleryHelper::addErrorLocation())->send();
			exit;
		}
		GalleryHelper::pasteClipboard($data, $action, $path);
		$this->clearClipboard();
	}
	
	/**
	 * Clears the clipboard
	 */
	public function clearClipboard()
	{
		session()->put('RF.clipboard.path', null);
		session()->put('RF.clipboard_action', null);
	}
	
	/**
	 * Returns file permissions table
	 */
	public function getFilePermissionsTable()
	{
		if ($this->config['filesystem'] == GalleryEnumeration::STORAGE) {
			return 'it will be included';
		} elseif ($this->config['filesystem'] == GalleryEnumeration::FTP) {
			$path = $this->config['ftp_base_url'] . $this->config['upload_dir'] . request('path');
			if (
				($_POST['folder'] == 1 && $this->config['chmod_dirs'] === false)
				|| ($_POST['folder'] == 0 && $this->config['chmod_files'] === false)
				|| (GalleryHelper::isFunctionCallable("chmod") === false)) {
				GalleryHelper::response(sprintf(trans('File_Permission_Not_Allowed'), (is_dir($path) ? trans('Folders') : trans('Files')), 403) . GalleryHelper::addErrorLocation())->send();
				exit;
			}
			$info = $_POST['permissions'];
		} else {
			$path = $this->config['current_path'] . request('path');
			if (
				(is_dir($path) && $this->config['chmod_dirs'] === false)
				|| (is_file($path) && $this->config['chmod_files'] === false)
				|| (GalleryHelper::isFunctionCallable("chmod") === false)) {
				GalleryHelper::response(sprintf(trans('File_Permission_Not_Allowed'), (is_dir($path) ? trans('Folders') : trans('Files')), 403) . GalleryHelper::addErrorLocation())->send();
				exit;
			}
			$perms = fileperms($path) & 0777;
			$info = '-';
			// Owner
			$info .= (($perms & 0x0100) ? 'r' : '-');
			$info .= (($perms & 0x0080) ? 'w' : '-');
			$info .= (($perms & 0x0040) ?
				(($perms & 0x0800) ? 's' : 'x') :
				(($perms & 0x0800) ? 'S' : '-'));
			
			// Group
			$info .= (($perms & 0x0020) ? 'r' : '-');
			$info .= (($perms & 0x0010) ? 'w' : '-');
			$info .= (($perms & 0x0008) ?
				(($perms & 0x0400) ? 's' : 'x') :
				(($perms & 0x0400) ? 'S' : '-'));
			
			// World
			$info .= (($perms & 0x0004) ? 'r' : '-');
			$info .= (($perms & 0x0002) ? 'w' : '-');
			$info .= (($perms & 0x0001) ?
				(($perms & 0x0200) ? 't' : 'x') :
				(($perms & 0x0200) ? 'T' : '-'));
		}
		$ret = HtmlHelper::filePermissionsTable($info, $path, $this->getFtp());
		GalleryHelper::response($ret)->send();
		exit;
	}
	
	/**
	 * Chmod settings file or folder
	 */
	public function chmod()
	{
		$mode = request('new_mode');
		$rec_option = request('is_recursive');
		$path = request('path');
		$valid_options = array('none', 'files', 'folders', 'both');
		$chmod_perm = ($_POST['folder'] ? $this->config['chmod_dirs'] : $this->config['chmod_files']);
		// check perm
		if ($chmod_perm === false) {
			GalleryHelper::response(sprintf(trans('File_Permission_Not_Allowed'), (is_dir($path) ? (__('Folders')) : (__('Files')))) . GalleryHelper::addErrorLocation())->send();
			exit;
		}
		// check mode
		if (!preg_match("/^[0-7]{3}$/", $mode)) {
			GalleryHelper::response(trans('File_Permission_Wrong_Mode') . GalleryHelper::addErrorLocation())->send();
			exit;
		}
		// check recursive option
		if (!in_array($rec_option, $valid_options)) {
			GalleryHelper::response(trans("wrong option") . GalleryHelper::addErrorLocation())->send();
			exit;
		}
		// check if server disabled chmod
		if (!$this->getFtp() && GalleryHelper::isFunctionCallable('chmod') === false) {
			GalleryHelper::response(sprintf(trans('Function_Disabled'), 'chmod') . GalleryHelper::addErrorLocation())->send();
			exit;
		}
		$mode = "0" . $mode;
		$mode = octdec($mode);
		if ($this->getFtp()) {
			$this->getFtp()->chmod($mode, "/" . $path);
		} else {
			GalleryHelper::recursiveChmod($path, $mode, $rec_option);
		}
	}
	
	/**
	 * Save image
	 */
	public function saveImage()
	{
		$info = pathinfo(request('name'));
		
		$image_data = request('url');
		
		if (preg_match('/^data:image\/(\w+);base64,/', $image_data, $type)) {
			
			$image_data = substr($image_data, strpos($image_data, ',') + 1);
			
			$type = strtolower($type[1]); // jpg, png, gif
			
			$image_data = base64_decode($image_data);
			
			if ($image_data === false) {
				
				GalleryHelper::response(trans('TUI_Decode_Failed') . GalleryHelper::addErrorLocation())->send();
				
				exit;
				
			}
			
		} else {
			
			GalleryHelper::response(__('') . GalleryHelper::addErrorLocation())->send();
			
			exit;
			
		}
		
		if ($image_data === false) {
			
			GalleryHelper::response(__('') . GalleryHelper::addErrorLocation())->send();
			
			exit;
			
		}
		
		if (!GalleryHelper::checkResultingSize(strlen($image_data))) {
			
			GalleryHelper::response(sprintf(trans('max_size_reached'), $this->config['MaxSizeTotal']) . GalleryHelper::addErrorLocation())->send();
			
			exit;
		}
		if ($this->getFtp()) {
			
			$temp = @tempnam('/tmp', 'RF');
			
			unlink($temp);
			
			$temp .= "." . substr(strrchr($_POST['url'], '.'), 1);
			
			file_put_contents($temp, $image_data);
			
			$this->getFtp()->put($this->config['ftp_base_folder'] . $this->config['upload_dir'] . request('path') . $_POST['name'], $temp, FTP_BINARY);
			
			GalleryHelper::createImg($temp, $temp, 122, 91);
			
			$this->getFtp()->put($this->config['ftp_base_folder'] . $this->config['ftp_thumbs_dir'] . request('path') . $_POST['name'], $temp, FTP_BINARY);
			
			unlink($temp);
			
		} else {
			
			file_put_contents($this->config['current_path'] . request('path') . $_POST['name'], $image_data);
			
			GalleryHelper::createImg($this->config['current_path'] . request('path') . request('name'),
				$this->config['thumbs_base_path'] . request('path') . request('name'),
				122,
				91
			);
			
			// TODO something with this function cause its blowing my mind
			GalleryHelper::newThumbnailsCreation(
				$this->config['current_path'] . request('path'),
				$this->config['current_path'] . request('path') . $_POST['name'],
				$_POST['name'],
				$this->config['current_path']
			);
		}
	}
	
	/**
	 * Sort folders and files
	 */
	public function sort()
	{
		$sortBy = request('sort_by');
		$descending = request('descending');
		if (CheckHelper::isNotEmpty($sortBy)) {
			session()->put('RF.sort_by', $sortBy);
		}
		if (CheckHelper::isNotEmpty($descending)) {
			session('RF.sort_by', $descending);
		}
	}
	
	/**
	 * Edit or file
	 */
	public function editOrPreviewFile()
	{
		$sub_action = request('sub_action');
		$preview_mode = request('preview_mode');
		$file = request('file');
		if ($sub_action != 'preview' && $sub_action != 'edit') {
			GalleryHelper::response(trans('wrong action') . GalleryHelper::addErrorLocation())->send();
			exit;
		}
		if ($this->config['filesystem'] == GalleryEnumeration::STORAGE) {
			$selected_file = ($sub_action == 'preview' ? $this->config['current_path'] . $file : $this->config['current_path'] . request('path'));
		} elseif ($this->config['filesystem'] == GalleryEnumeration::STORAGE) {
			$selected_file = ($sub_action == 'preview' ? $this->config['ftp_base_url'] . $this->config['upload_dir'] . $file : $this->config['ftp_base_url'] . $this->config['upload_dir'] . request('path'));
		} else {
			$selected_file = ($sub_action == 'preview' ? $this->config['current_path'] . $file : $this->config['current_path'] . request('path'));
			if (!file_exists($selected_file)) {
				GalleryHelper::response(__('File Not Found') . GalleryHelper::addErrorLocation())->send();
				exit;
			}
		}
		$info = pathinfo($selected_file);
		if ($preview_mode == 'text') {
			$is_allowed = ($sub_action == 'preview' ? $this->config['preview_text_files'] : $this->config['edit_text_files']);
			$allowed_file_exts = ($sub_action == 'preview' ? $this->config['previewable_text_file_exts'] : $this->config['editable_text_file_exts']);
		} elseif ($preview_mode == 'google') {
			$is_allowed = $this->config['googledoc_enabled'];
			$allowed_file_exts = $this->config['googledoc_file_exts'];
		}
		if (!isset($allowed_file_exts) || !is_array($allowed_file_exts)) {
			$allowed_file_exts = array();
		}
		if (!isset($info['extension'])) {
			$info['extension'] = '';
		}
		if (!in_array($info['extension'], $allowed_file_exts) ||
			!isset($is_allowed)
//			||
//			$is_allowed === false ||
//			(!$this->getFtp() && !is_readable($selected_file))
		) {
			GalleryHelper::response(sprintf(trans('File_Open_Edit_Not_Allowed'), ($sub_action == 'preview' ? strtolower(trans('Open')) : strtolower(trans('Edit')))) . GalleryHelper::addErrorLocation())->send();
			exit;
		}
		if ($sub_action == 'preview') {
			if ($preview_mode == 'text') {
				// get and sanities
				$data = @file_get_contents($selected_file);
				$data = htmlspecialchars(htmlspecialchars_decode($data));
				$ret = '';
				$ret .= HtmlHelper::getPrettyCode($info, $data);
			} elseif ($preview_mode == 'google') {
				if ($this->getFtp()) {
					$url_file = $selected_file;
				} else {
					$url_file = url($file);
				}
				$ret = HtmlHelper::getGoogleDocs($url_file);
			}
		} else {
			$data = @file_get_contents($selected_file);
//			$data = stripslashes(htmlspecialchars(file_get_contents($selected_file)));
			if (in_array($info['extension'], array('html', 'html'))) {
				$ret = HtmlHelper::getCkEditor($data);
			} else {
				$ret = HtmlHelper::getTextArea($data);
			}
		}
		GalleryHelper::response($ret)->send();
		exit;
	}
	
	/**
	 * Saves text file
	 *
	 * @return mixed|string
	 * @throws FtpException
	 */
	public function saveTextFile()
	{
		$content = request('new_content');
		$path = request('path');
		$disk = $this->getDisk();
		// $content = htmlspecialchars($content); not needed
		// $content = stripslashes($content);
		switch ($this->config['filesystem']) {
			case GalleryEnumeration::STORAGE:
				return StorageHelper::saveTextFile($path, $content);
				break;
			case GalleryEnumeration::FTP:
				return FtpHelper::saveTextFile($path, $content);
				break;
			case GalleryEnumeration::LOCAL:
				return LocalHelper::saveTextFile($path, $content);
				break;
			default:
				return GalleryEnumeration::NO_FILESYSTEM;
		}
	}
	
	/**
	 * Extract File
	 */
	public function extractFile()
	{
		if (!$this->config['extract_files']) {
			
			GalleryHelper::response(__('Wrong Action') . GalleryHelper::addErrorLocation())->send();
			
		}
		
		if ($this->getFtp()) {
			
			$path = $this->config['ftp_base_url'] . $this->config['upload_dir'] . request('path');
			
			$base_folder = $this->config['ftp_base_url'] . $this->config['upload_dir'] . GalleryHelper::fixDirname(request('path')) . "/";
			
		} else {
			
			$path = $this->config['current_path'] . request('path');
			
			$base_folder = $this->config['current_path'] . GalleryHelper::fixDirname(request('path')) . "/";
			
		}
		
		$info = pathinfo($path);
		
		if ($this->getFtp()) {
			
			$tempDir = GalleryHelper::tempdir();
			
			$temp = @tempnam($tempDir, 'RF');
			
			unlink($temp);
			
			$temp .= "." . $info['extension'];
			
			$handle = fopen($temp, "w");
			
			fwrite($handle, file_get_contents($path));
			
			fclose($handle);
			
			$path = $temp;
			
			$base_folder = $tempDir . "/";
			
		}
		
		$info = pathinfo($path);
		
		switch ($info['extension']) {
			
			case "zip":
				
				$zip = new ZipArchive;
				
				if ($zip->open($path) === true) {
					
					//get total size
					
					$sizeTotalFinal = 0;
					
					for ($i = 0; $i < $zip->numFiles; $i++) {
						
						$aStat = $zip->statIndex($i);
						
						$sizeTotalFinal += $aStat['size'];
						
					}
					
					if (!GalleryHelper::checkResultingSize($sizeTotalFinal)) {
						
						GalleryHelper::response(sprintf(trans('max_size_reached'), $this->config['MaxSizeTotal']) . GalleryHelper::addErrorLocation())->send();
						
						exit;
						
					}
					
					//make all the folders and unzip into the folders
					for ($i = 0; $i < $zip->numFiles; $i++) {
						
						$FullFileName = $zip->statIndex($i);
						
						if (GalleryHelper::checkRelativePath($FullFileName['name'])) {
							
							if (substr($FullFileName['name'], -1, 1) == "/") {
								
								GalleryHelper::createFolder($base_folder . $FullFileName['name']);
								
							}
							
							if (!(substr($FullFileName['name'], -1, 1) == "/")) {
								
								$fileinfo = pathinfo($FullFileName['name']);
								
								if (in_array(strtolower($fileinfo['extension']), $this->config['ext'])) {
									
									copy('zip://' . $path . '#' . $FullFileName['name'], $base_folder . $FullFileName['name']);
									
								}
								
							}
						}
					}
					
					$zip->close();
					
				} else {
					
					GalleryHelper::response(trans('Zip_No_Extract') . GalleryHelper::addErrorLocation())->send();
					
					exit;
					
				}
				
				break;
			
			case "gz":
				
				// No resulting size pre-control available
				$p = new PharData($path);
				
				$p->decompress(); // creates files.tar
				
				break;
			
			case "tar":
				
				// No resulting size pre-control available
				// unarchive from the tar
				$phar = new PharData($path);
				
				$phar->decompressFiles();
				
				$files = array();
				
				GalleryHelper::checkFilesExtensionsOnPhar($phar, $files, '');
				
				$phar->extractTo($base_folder, $files, true);
				
				break;
			
			default:
				
				GalleryHelper::response(trans('Zip_Invalid') . GalleryHelper::addErrorLocation())->send();
				
				exit;
			
		}
		
		if ($this->getFtp()) {
			
			unlink($path);
			
			$this->getFtp()->putAll($base_folder, "/" . $this->config['ftp_base_folder'] . $this->config['upload_dir'] . GalleryHelper::fixDirname(request('path')), FTP_BINARY);
			
			GalleryHelper::deleteDir($base_folder);
			
		}
	}
	
	/**
	 * Preview media
	 */
	public function previewMedia()
	{
		$file = request('file');
		
		$title = request('title');
		
		if (request()->has('file')) {
			
			$file = SecurityHelper::sanitize($file, true);
			
		}
		
		if (request()->has('title')) {
			
			$title = SecurityHelper::sanitize($title, true);
			
		}
		
		if ($this->getFtp()) {
			
			$preview_file = $this->config['ftp_base_url'] . $this->config['upload_dir'] . $file;
			
		} else {
			
			$preview_file = $this->config['current_path'] . $file;
			$preview_file = str_replace('public/', '', $preview_file);
			
		}
		
		$info = pathinfo($preview_file);
		
		ob_start();
		
		echo HtmlHelper::galleryMusicOrVideo();
		
		if (in_array(strtolower($info['extension']), $this->config['ext_music'])) {
			
			echo HtmlHelper::galleryMusicScript($title, $preview_file);
			
		} elseif (in_array(strtolower($info['extension']), $this->config['ext_video'])) {
			
			echo HtmlHelper::galleryVideoScript($title, $preview_file);
			
		}
		
		$content = ob_get_clean();
		
		GalleryHelper::response($content)->send();
		
		exit;
	}
	
	/**
	 * Preview cad
	 */
	public function previewCad()
	{
		if ($this->getFtp()) {
			
			$selected_file = $this->config['ftp_base_url'] . $this->config['upload_dir'] . $_GET['file'];
			
		} else {
			
			$selected_file = $this->config['current_path'] . $_GET['file'];
			
			if (!file_exists($selected_file)) {
				
				GalleryHelper::response(__('File Not Found') . GalleryHelper::addErrorLocation())->send();
				
				exit;
				
			}
			
		}
		
		if ($this->config['filesystem'] == GalleryEnumeration::STORAGE) {
			
			$url_file = $this->config['storage_base_url'] . $this->config['upload_dir'] . str_replace($this->config['current_path'], '', $_GET["file"]);
			
		} else if ($this->config['filesystem'] == GalleryEnumeration::FTP) {
			
			$url_file = $selected_file;
			
		} else {
			
			$url_file = $this->config['base_url'] . $this->config['upload_dir'] . str_replace($this->config['current_path'], '', $_GET["file"]);
			
		}
		
		$cad_url = urlencode($url_file);
		
		$cad_html = "<iframe src=\"//sharecad.org/cadframe/load?url=" . $url_file . "\" class=\"google-iframe\" scrolling=\"no\"></iframe>";
		
		$ret = $cad_html;
		
		GalleryHelper::response($ret)->send();
	}
	
	/**
	 * Returns clipboard path variable
	 *
	 * @return int
	 */
	public function hasClipboardPath()
	{
		return (session()->has('RF.clipboard.path') && trim(session('RF.clipboard.path')) != null) ? 1 : 0;
	}
}
