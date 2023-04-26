<?php

namespace App\Http\Files\traits;

use Illuminate\Support\Facades\Storage;

/**
 * Trait ReplaceFile for file updating.
 *
 * @package App\Http\Files\traits
 */
trait ReplaceFile
{
    // Traits
    use StoreFile, RemoveFile;

    /**
     * This method gets a file information and updates it.
     *
     * @param $root string root directory
     * @param $name string file name
     * @param $content
     * @param string $old old file name
     * @return false|string
     */
    public function replaceFile(string $root, string $name, $content, $old = '')
    {
        if (Storage::disk('public')->exists($old)) {
            $this->removeFile($old);
        }
        return $this->storeFile($root, $name, $content);
    }
}
