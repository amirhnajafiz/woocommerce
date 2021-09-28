<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\BrandCollection;
use App\Http\Resources\BrandResource;
use App\Models\Brand;
use Illuminate\Http\Request;

/**
 * Class BrandControllerAPI for Brand API methods.
 *
 * @package App\Http\Controllers\API
 */
class BrandControllerAPI extends Controller
{
    /**
     * The index method returns brands in paginate format.
     *
     */
    public function index(): BrandCollection
    {
        return new BrandCollection(Brand::paginate(5));
    }

    /**
     * Show method handles a single brand showing.
     *
     * @param Brand $brand
     * @return BrandResource
     */
    public function show(Brand $brand): BrandResource
    {
        return new BrandResource($brand);
    }
}
