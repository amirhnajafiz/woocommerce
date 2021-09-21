<?php

namespace App\Http\Files\traits;

use Illuminate\Support\Facades\Storage;

/**
 * Trait RemoveFile for removing file.
 *
 * @package App\Http\Files\traits
 */
trait RemoveFile
{
    /**
     * This method will get a name and will remove a file from our storage.
     *
     * @param $name string file name
     * @return bool
     */
    public function removeFile(string $name): bool
    {
        return Storage::disk('public')->delete($name);
    }
}
