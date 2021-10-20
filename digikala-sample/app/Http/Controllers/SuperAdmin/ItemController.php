<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Http\Files\FileManager;
use App\Http\Requests\CreateUpdateItemRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Item;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

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
        $items = Item::paginate(6);

        return view('admin.item.index')
            ->with('items', $items);
    }

    /**
     * Show the form for creating a new item resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        $brands = Brand::all();
        $categories = Category::all();
        return view('admin.item.create')
            ->with('categories', $categories)
            ->with('brands', $brands);
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

        $item = DB::transaction(function () use ($request, $validated) {
            $item = Item::query()
                ->create($validated);
            $name = 'file' . $item->id;

            $item->categories()
                ->sync($validated['category_id']);

            FileManager::instance()
                ->storeFile('store/item/', $name, $request->file('file'));

            $item->image()
                ->create([
                    'title' => $item->name,
                    'slug' => $item->slug,
                    'path' => './storage/store/item/' . $name
                ]);

            return $item;
        });

        return redirect()
            ->route('item.show', $item->id);
    }

    /**
     * Display the specified item resource.
     *
     * @param Item $item
     * @return Application|Factory|View|Response
     */
    public function show(Item $item)
    {
        return view('utils.item.show')
            ->with('item', $item);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Item $item
     * @return Application|Factory|View|Response
     */
    public function edit(Item $item)
    {
        $brands = Brand::all();
        $categories = Category::all();
        return view('admin.item.edit')
            ->with('categories', $categories)
            ->with('brands', $brands)
            ->with('item', $item);
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

        DB::transaction(function () use ($request, $validated, $item) {
            $item->update($validated);

            $item->categories()
                ->sync($validated['category_id']);

            if ($request->has('file')) {
                $path = $item->image->path;
                FileManager::instance()
                    ->replaceFile('store/item/file', $item->id, $request->file('file'), $path);
            }

            $item->save();
        });

        return redirect()
            ->route('item.show', $item);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Item $item
     * @return RedirectResponse|Response
     */
    public function destroy(Item $item)
    {
        DB::transaction(function () use ($item) {
            FileManager::instance()
                ->removeFile($item->image->path);
            $item->delete();
        });

        return redirect()
            ->route('item.index');
    }
}
