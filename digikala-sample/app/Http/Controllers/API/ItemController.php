<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Files\FileManager;
use App\Http\Requests\CreateUpdateItemRequest;
use App\Models\Item;
use Illuminate\Http\JsonResponse;

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
}
