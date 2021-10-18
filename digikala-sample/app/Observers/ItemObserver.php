<?php

namespace App\Observers;

use App\Http\Files\FileManager;
use App\Jobs\ItemCreate;
use App\Models\Item;

/**
 * Class ItemObserver.
 *
 * @package App\Observers
 */
class ItemObserver
{
    /**
     * Handling created event.
     *
     * @param Item $item
     */
    public function created(Item $item)
    {
        ItemCreate::dispatch($item);
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
