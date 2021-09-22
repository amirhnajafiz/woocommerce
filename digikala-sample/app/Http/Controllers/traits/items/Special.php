<?php

namespace App\Http\Controllers\traits\items;

use App\Models\Item;
use App\Models\SpecialItem;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;


/**
 * Trait Special for managing special items.
 *
 * @package App\Http\Controllers\traits\items
 */
trait Special
{
    /**
     * This method makes an item, to a special item.
     *
     * @param $id int item id
     * @param Request $request user request
     * @return JsonResponse
     */
    public function makeSpecial(int $id, Request $request): JsonResponse
    {
        $item = Item::query()->findOrFail($id);
        // Create one special item in database
        SpecialItem::query()->create([
           'item_id' => $item->id,
           'expire_date' => $request->input('date') ?? null,
           'discount' => $request->input('amount')
        ]);

        return response()->json([
            'status' => 'OK'
        ]);
    }
}
