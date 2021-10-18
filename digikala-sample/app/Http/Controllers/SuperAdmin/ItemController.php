<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Http\Files\FileManager;
use App\Http\Requests\CreateUpdateItemRequest;
use App\Models\Item;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

/**
 * Class ItemController will handle the items methods.
 *
 * @package App\Http\Controllers\Web
 */
class ItemController extends Controller
{
    /**
     * Display a listing of the items resource.
     *
     * @return Application|Factory|View|Response
     * @throws Exception
     */
    public function index()
    {
        $items = Item::paginate(2);

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
        return view('web.admin.utils.item.create-item-panel')
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

        $item->categories()->sync($validated['category_id']);

        FileManager::instance()->storeFile('store/item/', $item->id, $request->file('file'));
        $item->image()->create([
            'title' => $item->name,
            'slug' => $item->slug,
            'path' => 'store/item/' . $item->id
        ]);

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
        return view('web.utils.item.show')
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
        return view('web.admin.utils.item.edit-item')
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

        $item->categories()->sync($validated['category_id']);

        if ($request->has('file')) {
            $path = $item->image->path;
            FileManager::instance()->replaceFile('store/item/', $item->id, $request->file('file'), $path);
        }

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
        FileManager::instance()->removeFile($item->image->path);
        $item->delete();

        return redirect()->route('item.index');
    }
}
