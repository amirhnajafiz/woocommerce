<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ItemCollection;
use App\Http\Resources\ItemResource;
use App\Http\Resources\SpecialItemCollection;
use App\Models\Item;
use App\Models\SpecialItem;

/**
 * Class ItemControllerAPI for Item API methods.
 *
 * @package App\Http\Controllers\API
 */
class ItemControllerAPI extends Controller
{
    /**
     * Getting all of the items in paginate format.
     *
     * @return ItemCollection
     */
    public function index(): ItemCollection
    {
        return new ItemCollection(Item::paginate(5));
    }

    /**
     * Getting a single item data.
     *
     * @param Item $item user requested item
     * @return ItemResource
     */
    public function show(Item $item): ItemResource
    {
        return new ItemResource($item);
    }

    /**
     * Getting all of the special items with paginate format.
     *
     * @return ItemCollection|SpecialItemCollection
     */
    public function special()
    {
        return new SpecialItemCollection(SpecialItem::paginate(5));
    }
}
