<?php

namespace Gallery\Enumerations;

/**
 * Class GalleryEnumeration
 * @package Gallery\Enumerations
 */
class GalleryEnumeration
{
	/*
	 * Verification code for your gallery app
	 */
	const VERIFICATION_CODE = 'Laravel-Gallery';
	
	/*
	 * Open or close debug for the error message according to true or false
	 */
	const DEBUG_ERROR_MESSAGE = false;
	
	/*
	 * File system type is storage
	 */
	const STORAGE = 'storage';
	
	/*
	 * File system type is ftp
	 */
	const FTP = 'ftp';
	
	/*
	 * File system type is local
	 */
	const LOCAL = 'local';
	
	/*
	 * If there is no filesystem option shows that
	 */
	const NO_FILESYSTEM = 'Make sure that you enter either the storage, ftp or local options of the filesystem setting in gallery.php!';
}