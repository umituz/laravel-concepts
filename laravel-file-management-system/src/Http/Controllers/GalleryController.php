<?php


namespace Gallery\Http\Controllers;

use Gallery\Repositories\GalleryRepository;
use Gallery\Services\FtpException;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;

/**
 * Class GalleryController
 * @package Gallery\Http\Controllers\Admin
 */
class GalleryController extends Controller
{
	/**
	 * @var GalleryRepository
	 */
	private $galleryRepository;
	
	/**
	 * RolesController constructor.
	 * Stores the data required when the class is first called
	 * Restricts full access for many users
	 * @param GalleryRepository $galleryRepository
	 */
	public function __construct(GalleryRepository $galleryRepository)
	{
		$this->galleryRepository = $galleryRepository;
	}
	
	/**
	 *  Display gallery
	 *
	 * @return Factory|View
	 * @throws FtpException
	 */
	public function index()
	{
		return $this->galleryRepository->index();
	}
	
	/**
	 * Create folder
	 */
	public function createFolder()
	{
		$this->galleryRepository->createFolder();
	}
	
	/**
	 * Rename folder
	 */
	public function renameFolder()
	{
		$this->galleryRepository->renameFolder();
	}
	
	/**
	 * Delete folder
	 */
	public function deleteFolder()
	{
		$this->galleryRepository->deleteFolder();
	}
	
	/**
	 * Create file form html codes as the string
	 *
	 * @return string
	 */
	public function createFileForm()
	{
		return $this->galleryRepository->createFileForm();
	}
	
	/**
	 * Create File
	 */
	public function createFile()
	{
		$this->galleryRepository->createFile();
	}
	
	/**
	 * View Type
	 */
	public function view()
	{
		$this->galleryRepository->view();
	}
	
	/**
	 * Upload File
	 */
	public function upload()
	{
		$this->galleryRepository->upload();
	}
	
	/**
	 * File Download
	 */
	public function fileDownload()
	{
		$this->galleryRepository->fileDownload();
	}
	
	/**
	 * File Rename
	 */
	public function renameFile()
	{
		$this->galleryRepository->renameFile();
	}
	
	/**
	 * Delete file
	 */
	public function deleteFile()
	{
		$this->galleryRepository->deleteFile();
	}
	
	/**
	 * Delete files
	 */
	public function deleteFiles()
	{
		$this->galleryRepository->deleteFiles();
	}
	
	/**
	 * Filter file
	 */
	public function filter()
	{
		$this->galleryRepository->filter();
	}
	
	/**
	 * Duplicate file
	 */
	public function duplicateFile()
	{
		$this->galleryRepository->duplicateFile();
	}
	
	/**
	 * Copy Cut File
	 */
	public function copyCutFile()
	{
		$this->galleryRepository->copyCutFile();
	}
	
	/**
	 * Paste Clipboard
	 */
	public function pasteClipboard()
	{
		$this->galleryRepository->pasteClipboard();
	}
	
	/**
	 * Clear Clipboard
	 */
	public function clearClipboard()
	{
		$this->galleryRepository->clearClipboard();
	}
	
	/**
	 * Returns file permissions table
	 */
	public function getFilePermissionsTable()
	{
		$this->galleryRepository->getFilePermissionsTable();
	}
	
	/**
	 * Chmod file or folder
	 */
	public function chmod()
	{
		$this->galleryRepository->chmod();
	}
	
	/**
	 * Save Image
	 */
	public function saveImage()
	{
		$this->galleryRepository->saveImage();
	}
	
	/**
	 * Sort folders and files
	 */
	public function sort()
	{
		$this->galleryRepository->sort();
	}
	
	/**
	 * Edit or preview file
	 */
	public function editOrPreviewFile()
	{
		$this->galleryRepository->editOrPreviewFile();
	}
	
	/**
	 * Edit file
	 */
	public function saveTextFile()
	{
		$this->galleryRepository->saveTextFile();
	}
	
	/**
	 * Extract file
	 */
	public function extractFile()
	{
		$this->galleryRepository->extractFile();
	}
	
	/**
	 * Preview media
	 */
	public function previewMedia()
	{
		$this->galleryRepository->previewMedia();
	}
	
	/**
	 * Preview cad
	 */
	public function previewCad()
	{
		$this->galleryRepository->previewCad();
	}
}
