<?php

namespace App\Observers;

use App\Http\Files\FileManager;
use App\Models\Item;
use Illuminate\Support\Str;

/**
 * Class ItemObserver.
 *
 * @package App\Observers
 */
class ItemObserver
{
    /**
     * Handling creating event.
     *
     * @param Item $item
     */
    public function creating(Item $item)
    {
        $item->slug = Str::slug($item->name); // Slug creating
    }

    /**
     * Handle the Item "force deleted" event.
     *
     * @param Item $item
     * @return void
     */
    public function forceDeleted(Item $item)
    {
        if (isset($item->image)) {
            FileManager::instance()->removeFile($item->image->path);
            $item->image()->delete();
        }
    }
}