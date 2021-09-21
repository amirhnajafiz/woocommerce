<?php

namespace App\Observers;

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
        // TODO: Delete image
    }
}
