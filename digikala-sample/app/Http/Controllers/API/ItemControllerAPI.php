<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Item;
use Illuminate\Http\JsonResponse;

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
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $items = Item::paginate(5);

        return response()->json([
            'items' => $items
        ]);
    }

    /**
     * Getting a single item data.
     *
     * @param Item $item user requested item
     * @return JsonResponse
     */
    public function show(Item $item): JsonResponse
    {
        return response()->json([
            'item' => $item
        ]);
    }
}
