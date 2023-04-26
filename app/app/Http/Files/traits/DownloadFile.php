<?php

namespace App\Http\Files\traits;

use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;

/**
 * Trait DownloadFile for downloading files.
 *
 * @package App\Http\Files\traits
 */
trait DownloadFile
{
    /**
     * This method gets a path and downloads a file with its name.
     *
     * @param $path string path
     * @param $name string download name
     * @return StreamedResponse
     */
    public function downloadFile(string $path, string $name): StreamedResponse
    {
        return Storage::download($path, $name);
    }
}
