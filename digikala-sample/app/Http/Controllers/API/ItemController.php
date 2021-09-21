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
     * Store a newly created resource in storage.
     *
     * @param CreateUpdateItemRequest $request
     * @return JsonResponse
     */
    public function store(CreateUpdateItemRequest $request): JsonResponse
    {
        $validated = $request->validated();
        $item = Item::query()->create($validated);

        if ($request->file('file')) {
            $name = $item->id . "_image." . $request->file('file')->extension();
            // Storage storing
            FileManager::instance()->storeFile('items', $name, $request->file('file'));
            // Database storing
            $item->image()->create([
                'title' => $item->name,
                'alt' => $item->slug,
                'path' => 'items/' . $name
            ]);
        }

        return \response()->json([
            'status' => 'OK',
            'id' => $item->id
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
     * Update the specified resource in storage.
     *
     * @param CreateUpdateItemRequest $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(CreateUpdateItemRequest $request, int $id): JsonResponse
    {
        $item = Item::query()->findOrFail($id);
        $validated = $request->validated();

        $item->update($validated);

        if ($request->file('file')) {
            // Names
            $oldName = $item->image->path ?? ' ';
            $name = $item->id . "_image." . $request->file('file')->extension();
            // Storage update
            FileManager::instance()->replaceFile('items', $name, $request->file('file'), $oldName);
            // Database update
            $item->image()->updateOrCreate([], [
                'title' => $item->name,
                'alt' => $item->slug,
                'path' => 'items/' . $name
            ]);
        }

        $item->save();

        return \response()->json([
            'status' => 'OK',
            'id' => $item->id,
            'change' => 'OK'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        Item::query()->findOrFail($id)->delete();
        return \response()->json([
            'status' => 'OK',
            'item' => 'Delete'
        ]);
    }
}
