<?php

namespace App\Http\Controllers\Web\traits\Item;

use App\Models\SpecialItem;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use PHPUnit\Util\Json;

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
        $items = Json::prettify(\App\Http\Internal\APIRequest::handle(route('api.all.special')));

        return view('admin.route-views.specials')
            ->with('items', $items)
            ->with('title', '-special-items');
    }

    /**
     * Handles the special making.
     *
     * @param Request $request
     * @param \App\Models\Item $item
     * @return Application|ResponseFactory|Response
     */
    public function makeSpecial(Request $request, \App\Models\Item $item)
    {
        // TODO: Validate request

        SpecialItem::query()->create([
            'item_id' => $item->id,
            'expire_date' => now()->addMonth(),
            'discount' => $request->get('amount')
        ]);

        // TODO: Use a json response
        return response();
    }

    /**
     * Handles the special item removing.
     *
     * @param \App\Models\Item $item
     * @return Application|ResponseFactory|Response
     */
    public function removeSpecial(\App\Models\Item $item)
    {
        SpecialItem::query()
            ->where('item_id', '=', $item->id)
            ->delete();

        // TODO: Use a json response
        return response();
    }
}
