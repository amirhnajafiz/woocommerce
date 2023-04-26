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
}
