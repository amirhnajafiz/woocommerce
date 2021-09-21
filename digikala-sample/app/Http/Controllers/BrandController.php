<?php

namespace App\Http\Controllers;

use App\Http\Files\FileManager;
use App\Http\Requests\CreateUpdateBrandRequest;
use App\Models\Brand;
use Illuminate\Http\JsonResponse;

/**
 * Class BrandController for managing brands of the shop.
 *
 * @package App\Http\Controllers
 */
class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $brands = Brand::all();
        return \response()->json([
            'brands' => $brands
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return JsonResponse
     */
    public function create(): JsonResponse
    {
        return \response()->json([
            'status' => 'OK',
            'page' => 'Brand Create'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateUpdateBrandRequest $request
     * @return JsonResponse
     */
    public function store(CreateUpdateBrandRequest $request): JsonResponse
    {
        $validated = $request->validated();
        $brand = Brand::query()->create($validated);

        if ($request->file('file')) {
            $name = $brand->id . "_image." . $request->file('file')->extension();
            // Storage storing
            FileManager::instance()->storeFile('brands', $name, $request->file('file'));
            // Database storing
            $brand->image()->create([
                'title' => $brand->name,
                'alt' => $brand->slug,
                'path' => 'brands/' . $name
            ]);
        }

        return \response()->json([
            'status' => 'OK',
            'id' => $brand->id
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
        $brand = Brand::query()->findOrFail($id);
        return \response()->json([
            'brand' => $brand
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function edit(int $id): JsonResponse
    {
        $brand = Brand::query()->findOrFail($id);
        return \response()->json([
            'brand' => $brand,
            'page' => 'Update'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CreateUpdateBrandRequest $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(CreateUpdateBrandRequest $request, int $id): JsonResponse
    {
        $brand = Brand::query()->findOrFail($id);
        $validated = $request->validated();

        $brand->update($validated);

        if ($request->file('file')) {
            // Names
            $oldName = $brand->image->path ?? ' ';
            $name = $brand->id . "_image." . $request->file('file')->extension();
            // Storage update
            FileManager::instance()->replaceFile('brands', $name, $request->file('file'), $oldName);
            // Database update
            $brand->image()->updateOrCreate([], [
                'title' => $brand->name,
                'alt' => $brand->slug,
                'path' => 'brands/' . $name
            ]);
        }

        $brand->save();

        return \response()->json([
            'status' => 'OK',
            'id' => $brand->id,
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
        Brand::query()->findOrFail($id)->delete();
        return \response()->json([
            'status' => 'OK',
            'item' => 'Delete'
        ]);
    }
}
