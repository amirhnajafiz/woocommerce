<?php

namespace App\Http\Files;

use App\Http\Files\traits\DownloadFile;
use App\Http\Files\traits\RemoveFile;
use App\Http\Files\traits\ReplaceFile;
use App\Http\Files\traits\StoreFile;

/**
 * Class FileManager the file manager class for file handling.
 *
 * @package App\Http\Files
 */
class FileManager
{
    // Traits
    use StoreFile, RemoveFile, ReplaceFile, DownloadFile;

    // Singleton pattern
    private static $MANAGER;

    /**
     * This method gets the instance of the file manager.
     *
     * @return FileManager
     */
    public static function instance(): FileManager
    {
        if (!isset(self::$MANAGER)) {
            self::$MANAGER = new FileManager();
        }
        return self::$MANAGER;
    }
}
