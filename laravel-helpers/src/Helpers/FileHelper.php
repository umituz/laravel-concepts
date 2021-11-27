<?php

namespace LaravelHelper\Helpers;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;

/**
 * Class FileHelper
 * @package LaravelHelper\Helpers
 */
class FileHelper
{
	/**
	 * Returns information about the file from the form.
	 *
	 * @param $file
	 * @param null $extraPath
	 * @return mixed
	 */
	public static function getFileDetail($file, $extraPath = null)
	{
		if ($file instanceof UploadedFile) {
			$detail['path'] = $extraPath . $file->getClientOriginalName();
			$detail['mime_type'] = $file->getClientMimeType();
			return $detail;
		} else {
			$detail['path'] = $file;
			$detail['mime_type'] = self::getMimeType($file);
		}
		$detail['created_by'] = Auth::id();
		return $detail;
	}
	
	/**
	 * Returns mime type from file
	 *
	 * @param $file
	 * @return mixed|string
	 */
	public static function getMimeType($file)
	{
		if (is_file($file)) {
			return mime_content_type($file);
		}
		return last(explode('.', $file));
	}
}