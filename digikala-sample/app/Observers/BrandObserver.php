<?php

namespace App\Observers;

use App\Http\Files\FileManager;
use App\Jobs\BrandCreate;
use App\Models\Brand;
use Illuminate\Support\Str;

/**
 * Class BrandObserver.
 *
 * @package App\Observers
 */
class BrandObserver
{
    /**
     * Handle the Brand "creating" event.
     *
     * @param Brand $brand
     * @return void
     */
    public function creating(Brand $brand)
    {
        $brand->slug = Str::slug($brand->name); // Slug creating
    }

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
     * Handling updated event.
     *
     * @param Brand $brand
     */
    public function updating(Brand $brand)
    {
        $brand->slug = Str::slug($brand->name); // Slug creating
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
