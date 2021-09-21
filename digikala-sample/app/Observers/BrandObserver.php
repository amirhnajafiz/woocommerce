<?php

namespace App\Observers;

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
     * Handle the Brand "force deleted" event.
     *
     * @param Brand $brand
     * @return void
     */
    public function forceDeleted(Brand $brand)
    {
        // TODO: Delete the brand image
    }
}
