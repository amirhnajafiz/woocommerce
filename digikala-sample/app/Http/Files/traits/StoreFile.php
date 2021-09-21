<?php

namespace App\Http\Files\traits;

use Illuminate\Support\Facades\Storage;

/**
 * Trait FileCreate for storing files in public storage.
 *
 * @package App\Http\Controllers\traits\file
 */
trait StoreFile
{
    /**
     * This method will get a root and name to store the content given.
     *
     * @param $root string the root directory
     * @param $name string the name of the file
     * @param $content
     * @return false|string
     */
    public function storeFile(string $root, string $name, $content)
    {
        return Storage::disk('public')->putFileAs($root, $content, $name);
    }
}
