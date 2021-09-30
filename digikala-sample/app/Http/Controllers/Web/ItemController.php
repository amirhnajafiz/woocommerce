<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Web\traits\Item\Specialize;
use App\Http\Internal\APIRequest;
use App\Http\Requests\CreateUpdateItemRequest;
use App\Models\Item;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use PHPUnit\Util\Json;

/**
 * Class ItemController will handle the items methods.
 *
 * @package App\Http\Controllers\Web
 */
class ItemController extends Controller
{
    // Traits
    use Specialize;

    /**
     * Display a listing of the items resource.
     *
     * @return Application|Factory|View|Response
     * @throws Exception
     */
    public function index()
    {
        $items = Json::prettify(APIRequest::handle(route('api.all.item')));

        return view('web.admin.route-views.items')
            ->with('items', $items)
            ->with('title', '-all-items');
    }

    /**
     * Show the form for creating a new item resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        return view('web.utils.item.create-item-panel')
            ->with('title', '-create-item');
    }

    /**
     * Store a newly created item resource in storage.
     *
     * @param CreateUpdateItemRequest $request
     * @return RedirectResponse|Response
     */
    public function store(CreateUpdateItemRequest $request)
    {
        $validated = $request->validated();
        $item = Item::query()->create($validated);

        // TODO: Insert image adding feature

        return redirect()->route('item.show', $item);
    }

    /**
     * Display the specified item resource.
     *
     * @param Item $item
     * @return Application|Factory|View|Response
     */
    public function show(Item $item)
    {
        return view('web.utils.item.show-item')
            ->with('item', $item)
            ->with('title', '-item-' . $item->id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Item $item
     * @return Application|Factory|View|Response
     */
    public function edit(Item $item)
    {
        return view('web.utils.item.edit-item')
            ->with('item', $item)
            ->with('title', '-edit-item-' . $item->id);
    }

    /**
     * Update the specified item resource in storage.
     *
     * @param CreateUpdateItemRequest $request
     * @param Item $item
     * @return RedirectResponse|Response
     */
    public function update(CreateUpdateItemRequest $request, Item $item)
    {
        $validated = $request->validated();
        $item->update($validated);

        // TODO: Add the photo updating feature

        $item->save();

        return redirect()->route('item.show', $item);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Item $item
     * @return RedirectResponse|Response
     */
    public function destroy(Item $item)
    {
        $item->delete();

        // TODO: Photo remove from storage

        return redirect()->route('item.index');
    }
}
