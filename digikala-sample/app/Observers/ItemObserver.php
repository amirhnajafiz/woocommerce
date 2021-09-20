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
     * Handle the Item "created" event.
     *
     * @param Item $item
     * @return void
     */
    public function creating(Item $item)
    {
        $item->slug = Str::slug($item->name);
    }

    /**
     * Handle the Item "updated" event.
     *
     * @param Item $item
     * @return void
     */
    public function updated(Item $item)
    {
        $item->slug = Str::slug($item->name);
        $item->save();
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
