<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Files\FileManager;
use App\Http\Requests\CreateUpdateItemRequest;
use App\Models\Item;
use App\Models\SpecialItem;
use Illuminate\Http\JsonResponse;
use Ramsey\Collection\Collection;

/**
 * Class ItemController.
 *
 * @package App\Http\Controllers\API
 */
class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $items = Item::all();
        return \response()->json([
            'items' => $items
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $item = Item::query()->findOrFail($id);
        return \response()->json([
            'item' => $item
        ]);
    }

    /**
     * This method gets all of the special items.
     *
     * @return JsonResponse
     */
    public function getSpecialItems(): JsonResponse
    {
        $items = collect();
        $temp = SpecialItem::all();
        foreach ($temp as $item) {
            $items->add($item->item);
        }

        return response()->json([
            'status' => 'OK',
            'items' => $items
        ]);
    }
}
