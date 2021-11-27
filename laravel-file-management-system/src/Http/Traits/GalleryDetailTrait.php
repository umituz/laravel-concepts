<?php

namespace Gallery\Http\Traits;

use Gallery\Enumerations\GalleryEnumeration;
use Gallery\Helpers\GalleryHelper;
use Gallery\Helpers\StorageHelper;
use Gallery\Services\FtpException;
use Illuminate\Http\Request;
use Illuminate\Session\SessionManager;
use Illuminate\Session\Store;

/**
 * Trait GalleryDetailTrait
 * @package Gallery\Http\Traits
 */
trait GalleryDetailTrait
{
	/**
	 * Returns editor variable according to situation
	 *
	 * @return string|null
	 */
	public function requestHasEditor()
	{
		if (request()->has('editor')) {
			
			$editor = strip_tags(request('editor'));
			
		} else {
			
			$editor = request('type') == 0 ? null : 'tinymce';
			
		}
		
		return $editor;
	}
	
	/**
	 * Returns descending variable according to situation
	 *
	 * @return bool|mixed
	 */
	public function requestHasDescending()
	{
		$descending = session('RF.descending');
		
		if (request()->has('descending')) {
			
			$descending = GalleryHelper::fixGetParams(request('descending')) == 1;
			
			session()->put('RF.descending', $descending);
			
		}
		
		return $descending;
	}
	
	/**
	 * Returns sort_by variable according to situation
	 *
	 * @return mixed|string
	 */
	public function requestHasSortBy()
	{
		$sortBy = session('RF.sort_by');
		
		if (request()->has('sort_by')) {
			
			$sortBy = GalleryHelper::fixGetParams(request('sort_by'));
			
			session()->put('RF.sort_by', $sortBy);
			
		}
		
		return $sortBy;
	}
	
	/**
	 * Returns filter variable according to situation
	 *
	 * @return string
	 */
	public function requestHasFilter()
	{
		$filter = session()->has('RF.filter') ? session('RF.filter') : '';
		
		return request()->has('filter') ? GalleryHelper::fixGetParams(request('filter')) : $filter;
	}
	
	/**
	 * Returns callback variable according to situation
	 *
	 * @return int|mixed|string
	 */
	public function requestHasCallback()
	{
		if (request()->has('callback')) {
			
			$callback = strip_tags(request('callback'));
			
			session()->put('RF.callback', $callback);
			
		} else {
			
			$callback = 0;
			
			if (session()->has('RF.callback')) {
				
				$callback = session('RF.callback');
				
			}
		}
		
		return $callback;
	}
	
	/**
	 * Returns multiple variable according to situation
	 *
	 * @return int|null
	 */
	public function requestHasMultiple()
	{
		$multiple = null;
		
		if (request()->has('multiple')) {
			
			if (request('multiple') == 1) {
				
				$multiple = 1;
				
				$config['multiple_selection'] = true;
				
				$config['multiple_selection_action_button'] = true;
				
			} elseif (request('multiple') == 0) {
				
				$multiple = 0;
				
				$config['multiple_selection'] = false;
				
				$config['multiple_selection_action_button'] = false;
				
			}
		}
		
		return $multiple;
		
	}
	
	/**
	 * Returns popup variable according to situation
	 *
	 * @return bool|int|string
	 */
	public function requestHasPopup()
	{
		$popup = request()->has('popup') ? strip_tags(request('popup')) : 0;
		
		//Sanitize popup
		$popup = !!$popup;
		
		return $popup;
	}
	
	/**
	 * Returns crossdomain variable according to situation
	 *
	 * @return bool|int|string
	 */
	public function requestHasCrossDomain()
	{
		$crossdomain = request()->has('crossdomain') ? strip_tags(request('crossdomain')) : 0;
		
		//Sanitize crossdomain
		$crossdomain = !!$crossdomain;
		
		return $crossdomain;
	}
	
	/**
	 * Returns akey or key value according to situation
	 *
	 * @return array|Request|string
	 */
	public function requestHasAKey()
	{
		return request()->has('akey') && request('akey') != '' ? request('akey') : 'key';
	}
	
	/**
	 * Returns field_id variable according to situation
	 *
	 * @return string|null
	 */
	public function requestHasFieldId()
	{
		return request()->has('field_id') ? GalleryHelper::fixGetParams(request('field_id')) : null;
	}
	
	/**
	 * Returns extensions variable according to situation
	 *
	 * @return string|null
	 */
	public function requestHasExtensions()
	{
		$extensions = null;
		
		if (request()->has('extensions')) {
			
			$extensions = json_decode(urldecode(request('extensions')));
			
			$ext_tmp = array();
			
			foreach ($extensions as $extension) {
				
				$extension = GalleryHelper::fixStrToLower($extension);
				
				if (GalleryHelper::checkFileExtension($extension)) {
					
					$ext_tmp[] = $extension;
					
				}
				
			}
			
			if ($extensions) {
				
				$ext = $ext_tmp;
				
				$config['ext'] = $ext_tmp;
				
				$config['show_filter_buttons'] = false;
				
			}
		}
		
		return $extensions;
	}
	
	/**
	 * Returns true or false value according to situation
	 *
	 * @return bool
	 */
	public function requestHasRelativeUrl()
	{
		return request()->has('relative_url') && request('relative_url') == "1" ? true : false;
	}
	
	/**
	 * Returns type_param variable
	 *
	 * @return string
	 */
	public function getTypeParam()
	{
		return GalleryHelper::fixGetParams(request('type'));
	}
	
	/**
	 * Returns apply_type variable according to situation
	 *
	 * @return string|null
	 */
	public function getApplyType()
	{
		$type_param = $this->getTypeParam();
		
		if ($type_param == 1) {
			
			$apply_type = 'apply_img';
			
		} elseif ($type_param == 2) {
			
			$apply_type = 'apply_link';
			
		} elseif ($type_param == 0 && !$this->requestHasFieldId()) {
			
			$apply_type = 'apply_none';
			
		} elseif ($type_param == 3) {
			
			$apply_type = 'apply_video';
			
		} else {
			
			$apply_type = 'apply';
			
		}
		
		return $apply_type;
		
	}
	
	/**
	 * Returns get_params variable according to situation
	 *
	 * @return array|string
	 */
	public function getParams()
	{
		$get_params = array(
			'editor' => $this->requestHasEditor(),
			'type' => $this->getTypeParam(),
			'lang' => $lang ?? 'en_EN',
			'popup' => $this->requestHasPopup(),
			'crossdomain' => $this->requestHasCrossDomain(),
			'extensions' => ($this->requestHasExtensions()) ? urlencode(json_encode($this->requestHasExtensions())) : null,
			'field_id' => $this->requestHasFieldId(),
			'multiple' => $this->requestHasMultiple(),
			'relative_url' => $this->requestHasRelativeUrl(),
			'akey' => $this->requestHasAKey()
		);
		
		if (request()->has('CKEditorFuncNum')) {
			
			$get_params['CKEditorFuncNum'] = request('CKEditorFuncNum');
			
			$get_params['CKEditor'] = request()->has('CKEditor') ? request('CKEditor') : '';
			
		}
		
		$get_params['fldr'] = '';
		
		$get_params = http_build_query($get_params);
		
		return $get_params;
	}
	
	/**
	 * Returns apply variable according to situation
	 *
	 * @return string|null
	 */
	public function getApply()
	{
		$apply = null;
		
		if ($this->requestHasMultiple()) {
			
			$apply = 'apply_multiple';
			
		}
		
		
		if (!$apply) {
			
			$apply = $this->getApplyType();
			
		}
		
		return $apply;
	}
	
	/**
	 * Default type value if not request type is exists
	 */
	public function requestHasNotType()
	{
		if (!request()->has('type')) {
			
			request()->merge(['type' => 0]);
			
		}
	}
	
	/**
	 * Returns view variable according to situation
	 *
	 * @return mixed|string
	 */
	public function requestHasView()
	{
		if (!session()->has('RF.view_type')) {
			
			return session()->put('RF.view_type', $this->config['default_view']);
			
		}
		
		if (request()->has('view')) {
			
			$view = GalleryHelper::fixGetParams(request('view'));
			
			return session()->put('RF.view_type', $view);
			
		}
		
		return session('RF.view_type');
		
	}
	
	/**
	 * Returns Subdir and subdir_path
	 *
	 * @return array
	 */
	public function subDir()
	{
		$subdir_path = '';
		
		if (request()->has('fldr')) {
			
			$subdir_path = rawurldecode(trim(strip_tags($_GET['fldr']), "/"));
			
		} elseif (isset($_SESSION['RF']['fldr']) && !empty($_SESSION['RF']['fldr'])) {
			
			$subdir_path = rawurldecode(trim(strip_tags($_SESSION['RF']['fldr']), "/"));
			
		}
		
		if (GalleryHelper::checkRelativePath($subdir_path)) {
			
			$subdir = strip_tags($subdir_path) . "/";
			
			$_SESSION['RF']['fldr'] = $subdir_path;
			
			$_SESSION['RF']["filter"] = '';
			
		} else {
			
			$subdir = '';
			
		}
		
		if ($subdir == "") {
			
			if (!empty($_COOKIE['last_position']) && strpos($_COOKIE['last_position'], '.') === FALSE) {
				
				$subdir = trim($_COOKIE['last_position']);
				
			}
		}
		
		//remember last position
		setcookie('last_position', $subdir, time() + (86400 * 7));
		
		if ($subdir == "/") {
			$subdir = "";
		}
		
		
		// If hidden folders are specified
		if (count($this->config['hidden_folders'] ?? [])) {
			// If hidden folder appears in the path specified in URL parameter "fldr"
			$dirs = explode('/', $subdir);
			foreach ($dirs as $dir) {
				if ($dir !== '' && in_array($dir, $this->config['hidden_folders'])) {
					// Ignore the path
					$subdir = "";
					break;
				}
			}
		}
		
		return [
			'subdir' => $subdir,
			'subdir_path' => $subdir_path
		];
	}
	
	/**
	 * Returns rfm_subfolder variable according to situation
	 *
	 * @return mixed|string
	 */
	public function rfmSubFolder()
	{
		if (!session()->has('RF.subfolder')) {
			
			session()->put('RF.subfolder', '');
			
		}
		
		$rfm_subfolder = '';
		
		if (!empty(session('RF.subfolder'))
			
			&& strpos(session('RF.subfolder'), "/") !== 0
			
			&& strpos(session('RF.subfolder'), '.') === FALSE
		
		) {
			
			$rfm_subfolder = session('RF.subfolder');
			
		}
		
		if ($rfm_subfolder != "" && $rfm_subfolder[strlen($rfm_subfolder) - 1] != "/") {
			
			$rfm_subfolder .= "/";
			
		}
		
		$subDirFunction = $this->subDir()['subdir'];
		
		if (($this->ftp && !$this->ftp->isDir($this->config['ftp_base_folder'] . $this->config['upload_dir'] . $rfm_subfolder . $subDirFunction)) ||
			(!$this->ftp && !file_exists($this->config['current_path'] . $rfm_subfolder . $subDirFunction))
		) {
			
			$subdir = '';
			
			$rfm_subfolder = "";
			
		}
		
		return $rfm_subfolder;
		
	}
	
	/**
	 * Returns needed ftp variables
	 *
	 * @return array
	 */
	public function ftpVariables()
	{
		$subDirFunction = $this->subDir()['subdir'];
		
		$cur_dir = $this->config['upload_dir'] . $this->rfmSubFolder() . $subDirFunction;
		
		$cur_dir_thumb = $this->config['thumbs_upload_dir'] . $this->rfmSubFolder() . $subDirFunction;
		
		$thumbs_path = $this->config['thumbs_base_path'] . $this->rfmSubFolder() . $subDirFunction;
		
		$parent = $this->rfmSubFolder() . $subDirFunction;
		
		if ($this->ftp) {
			
			$cur_dir = $this->config['ftp_base_folder'] . $cur_dir;
			
			$cur_dir_thumb = $this->config['ftp_base_folder'] . $cur_dir_thumb;
			
			$thumbs_path = str_replace(array('/..', '..'), '', $cur_dir_thumb);
			
			$parent = $this->config['ftp_base_folder'] . $parent;
			
		}
		
		if (!$this->ftp) {
			
			$cycle = TRUE;
			
			$max_cycles = 50;
			
			$i = 0;
			
			while ($cycle && $i < $max_cycles) {
				
				$i++;
				
				if ($parent == "./") {
					
					$parent = "";
					
				}
				
				if (file_exists($this->config['current_path'] . $parent . "config.php")) {
					
					$configTemp = include $this->config['current_path'] . $parent . 'config.php';
					
					$config = array_merge($this->config, $configTemp);
					
					$cycle = FALSE;
					
				}
				
				if ($parent == "") {
					
					$cycle = FALSE;
					
				} else {
					
					$parent = GalleryHelper::fixDirname($parent) . "/";
					
				}
				
			}
			
			if (!is_dir($thumbs_path)) {
				
				GalleryHelper::createFolder(FALSE, $thumbs_path);
				
			}
		}
		
		return [
			'cur_dir' => $cur_dir,
			'cur_dir_thumb' => $cur_dir_thumb,
			'thumbs_path' => $thumbs_path,
			'parent' => $parent
		];
	}
	
	/**
	 * Session sort_by value according to situation
	 */
	public function sessionHasSortBy()
	{
		if (!session()->has('RF.sort_by')) {
			
			session()->put('RF.sort_by', 'name');
			
		}
	}
	
	/**
	 * Session descending value according to situation
	 */
	public function sessionHasDescending()
	{
		if (!session()->has('RF.descending')) {
			
			session()->put('RF.descending', true);
			
		}
	}
	
	/**
	 * Returns session verify key
	 *
	 * @return SessionManager|Store|mixed|void
	 */
	public function getSessionVerify()
	{
		return GalleryHelper::getCheckedSession('RF.verify', GalleryEnumeration::VERIFICATION_CODE);
	}
	
	/**
	 * Returns needed file variables
	 *
	 * @return array
	 * @throws FtpException
	 */
	public function files()
	{
		$subdir = $this->subDir()['subdir'];
		
		$disk = $this->getDisk();
		
		$ftp = false;
//		$ftp = GalleryHelper::ftpConnection($this->config);
		$directories = [];
		$sortedDir = [];
		
		if ($this->config['filesystem'] == GalleryEnumeration::STORAGE) {

//			$files = StorageHelper::scanDirectory();
			$directories = StorageHelper::getDirectories();
			$files = StorageHelper::getFiles();
		} elseif ($this->config['filesystem'] == GalleryEnumeration::FTP) {
			
			try {
				
				$files = $ftp->scanDir('/');

//				$files = $this->ftp->scanDir($this->config['ftp_base_folder'] . $this->config['upload_dir'] . $this->rfmSubFolder() . $subdir);
//
//
//				if (!$this->ftp->isDir($this->config['ftp_base_folder'] . $this->config['ftp_thumbs_dir'] . $this->rfmSubFolder() . $subdir)) {
//					GalleryHelper::createFolder(false, $this->config['ftp_base_folder'] . $this->config['ftp_thumbs_dir'] . $this->rfmSubFolder() . $subdir);
//
//				}
			
			} catch (FtpException $e) {
				
				echo __('Error') . ' : ';
				
				echo $e->getMessage();
				
				echo '<br/>' . __('Please Check Configurations');
				
				die();
				
			}
			
		} else {
			
			$directory = $this->config['current_path'] . $this->rfmSubFolder() . $subdir;
			$directory = $directory == '' ? '/' : $directory;
			$files = scandir($directory);
			
		}
		
		$n_files = count($files);
		
		//php sorting
		$sorted = array();
		
		//$current_folder=array();
		//$prev_folder=array();
		$current_files_number = 0;
		
		$current_folders_number = 0;
		
		foreach ($directories as $j => $dir) {
			
			$date = 0;
//					$date = $disk->lastModified($dir);
			$size = 0;
			
			$current_folders_number++;

//			if ($this->config['show_folder_size']) {
//
//				list($size, $nfiles, $nfolders) = GalleryHelper::folderInfo($this->config['current_path'] . $this->rfmSubFolder() . $subdir . $dir, false);
//
//			} else {
//
//				$size = 0;
//
//			}
			
			$file_ext = trans('Type_dir');
			
			$sortedDir[$j] = array(
				'is_dir' => true,
				'file' => $dir,
				'file_lcase' => strtolower($dir),
				'date' => $date,
				'size' => $size,
				'permissions' => '',
				'extension' => GalleryHelper::fixStrToLower($file_ext)
			);

//			if ($this->config['show_folder_size']) {
//
//				$sortedDir[$j]['nfiles'] = $nfiles;
//
//				$sortedDir[$j]['nfolders'] = $nfolders;
//
//			}
			
		}
		
		foreach ($files as $k => $file) {
			
			if ($this->config['filesystem'] == GalleryEnumeration::STORAGE) {
				
				$current_files_number++;
				
				$file_path = request('fldr') . $file;
				
				$date = 0;
//					$date = $disk->lastModified($file_path) ;
				
				$size = 0;
//					$size = $disk->size($file_path);
				
				$file_ext = substr(strrchr($file, '.'), 1);
				
				$sorted[$k] = array(
					'is_dir' => false,
					'file' => $file,
					'file_lcase' => strtolower($file),
					'date' => $date,
					'size' => $size,
					'permissions' => '',
					'extension' => strtolower($file_ext)
				);
				
			} elseif ($this->config['filesystem'] == GalleryEnumeration::FTP) {
				
				$date = strtotime($file['day'] . " " . $file['month'] . " " . date('Y') . " " . $file['time']);
				
				$size = $file['size'];
				
				if ($file['type'] == 'file') {
					
					$current_files_number++;
					
					$file_ext = substr(strrchr($file['name'], '.'), 1);
					
					$is_dir = false;
					
				} else {
					
					$current_folders_number++;
					
					$file_ext = trans('Type_dir');
					
					$is_dir = true;
					
				}
				
				$sorted[$k] = array(
					'is_dir' => $is_dir,
					'file' => $file['name'],
					'file_lcase' => strtolower($file['name']),
					'date' => $date,
					'size' => $size,
					'permissions' => $file['permissions'],
					'extension' => GalleryHelper::fixStrToLower($file_ext)
				);
				
			} else {
				if ($file != "." && $file != "..") {

//                    $f = $this->config['current_path'] . $this->rfmSubFolder() . $subdir . $file;
					
					if (StorageHelper::isDirectory(request('fldr'), $file)) {
						
						$date = @filemtime($file);
						
						$current_folders_number++;

//						if ($this->config['show_folder_size']) {
//
//							list($size, $nfiles, $nfolders) = GalleryHelper::folderInfo($this->config['current_path'] . $this->rfmSubFolder() . $subdir . $file, false);
//
//						} else {
//
//							$size = 0;
//
//						}
						
						$file_ext = trans('Type_dir');
						
						$sorted[$k] = array(
							'is_dir' => true,
							'file' => $file,
							'file_lcase' => strtolower($file),
							'date' => $date ?? 0,
							'size' => $size,
							'permissions' => '',
							'extension' => GalleryHelper::fixStrToLower($file_ext)
						);
						
						if ($this->config['show_folder_size']) {
							
							$sorted[$k]['nfiles'] = $nfiles;
							
							$sorted[$k]['nfolders'] = $nfolders;
							
						}
						
					} else {
						
						$current_files_number++;
						
						$file_path = $this->getDisk() ? $this->getDisk()->url('/') . $this->rfmSubFolder() . $subdir . $file : null;
						
						$date = @filemtime($file_path);
						
						$size = @filesize($file_path);
						
						$file_ext = substr(strrchr($file, '.'), 1);
						
						$sorted[$k] = array(
							'is_dir' => false,
							'file' => $file,
							'file_lcase' => strtolower($file),
							'date' => $date,
							'size' => $size,
							'permissions' => '',
							'extension' => strtolower($file_ext)
						);
						
					}
				}
			}
		}

//		switch ($this->requestHasSortBy()) {
//
//			case 'date':
//				usort($sorted, array('Gallery\\Helpers\\GalleryHelper', 'dateSort'));
//				break;
//			case 'size':
//				usort($sorted, array('Gallery\\Helpers\\GalleryHelper', 'sizeSort'));
//				break;
//			case 'extension':
//				usort($sorted, array('Gallery\\Helpers\\GalleryHelper', 'extensionSort'));
//				break;
//			default:
//				usort($sorted, array('Gallery\\Helpers\\GalleryHelper', 'filenameSort'));
//				break;
//
//		}
		
		if ($subdir != "") {
			
			$sortedDir = array_merge(array(array('file' => '..')), $sortedDir);
			
		}
		
		$files = $sorted;
		$directories = $sortedDir;
		
		return [
			'n_files' => $n_files,
			'current_files_number' => $current_files_number,
			'current_folders_number' => $current_folders_number,
			'files' => $files,
			'directories' => $directories
		];
	}
	
	/**
	 * Returns current url
	 *
	 * @return string|string[]
	 */
	public function currentUrl()
	{
		return GalleryHelper::getCurrentUrl($this->filter(), $this->requestHasSortBy(), $this->requestHasDescending(), $this->config['storage_base_url']);
	}
}
