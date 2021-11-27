<?php

namespace LaravelHelper\Helpers;

use Illuminate\Support\Facades\File;

/**
 * Class DirectoryHelper
 * @package LaravelHelper\Helpers
 */
class DirectoryHelper
{
    /**
     * Returns the files located under the directory sent as parameters
     *
     * @param $directory
     * @return array
     */
    public static function getFiles($directory)
    {
        if (File::isDirectory($directory)) {
            $files = File::files($directory);
            $fileList = array();
            if (count($files) > 0) {
                foreach ($files as $file) {
                    $fileList[] = $file->getFilename();
                }
            }
            return $fileList;
        }
        return [];
    }
    
    /**
     * Returns the directories located under the directory sent as parameters
     *
     * @param $directory
     * @return array
     */
    public static function getDirectories($directory)
    {
        if (File::isDirectory($directory)) {
            $directories = File::directories($directory);
            $directoryList = array();
            if (count($directories) > 0) {
                foreach ($directories as $dir) {
                    $directoryList[] = last(explode(DIRECTORY_SEPARATOR, $dir));
                }
            }
            return $directoryList;
        }
        return [];
    }
}
