<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\JsonResponse;

/**
 * Class BrandController.
 *
 * @package App\Http\Controllers\API
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
}
