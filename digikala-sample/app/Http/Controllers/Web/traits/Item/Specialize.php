<?php

namespace App\Http\Controllers\Web\traits\Item;

use App\Http\Internal\APIRequest;
use App\Http\Requests\Item\MakeSpecialItemRequest;
use App\Models\Item;
use App\Models\SpecialItem;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use PHPUnit\Util\Json;

/**
 * Trait Specialize for managing special items methods.
 *
 * @package App\Http\Controllers\Web\traits\Item
 */
trait Specialize
{
    /**
     * Handles the special items view.
     *
     * @return Application|Factory|View
     * @throws Exception
     */
    public function special()
    {
        $items = SpecialItem::paginate(2);

        return view('web.admin.route-views.specials')
            ->with('items', $items)
            ->with('title', '-special-items');
    }

    /**
     * Handles the special making.
     *
     * @param MakeSpecialItemRequest $request
     * @param Item $item
     * @return JsonResponse
     */
    public function makeSpecial(MakeSpecialItemRequest $request, Item $item): JsonResponse
    {
        $validated = $request->validated();

        SpecialItem::query()->create([
            'item_id' => $item->id,
            'expire_date' => now()->addMonth(),
            'discount' => $validated['amount']
        ]);

        // TODO: Add a job for removing the Item in expire date

        return response()->json([
            'status' => 'OK',
            'id' => $item->id
        ]);
    }

    /**
     * Handles the special item removing.
     *
     * @param Item $item
     * @return JsonResponse
     */
    public function removeSpecial(Item $item): JsonResponse
    {
        SpecialItem::query()
            ->where('item_id', '=', $item->id)
            ->delete();

        return response()->json([
            'status' => 'OK',
            'id' => $item->id
        ]);
    }
}
