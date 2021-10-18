<?php

namespace App\Observers;

use App\Http\Files\FileManager;
use App\Jobs\BrandCreate;
use App\Models\Brand;

/**
 * Class BrandObserver.
 *
 * @package App\Observers
 */
class BrandObserver
{
    /**
     * Handle the Brand "created" event.
     *
     * @param Brand $brand
     */
    public function created(Brand $brand)
    {
        BrandCreate::dispatch($brand);
    }

    /**
     * Handle the Brand "force deleted" event.
     *
     * @param Brand $brand
     * @return void
     */
    public function forceDeleted(Brand $brand)
    {
        if (isset($brand->image)) {
            FileManager::instance()->removeFile($brand->image->path);
            $brand->image()->delete();
        }
    }
}
