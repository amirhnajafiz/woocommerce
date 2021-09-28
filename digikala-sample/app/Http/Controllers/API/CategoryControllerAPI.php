<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryCollection;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\ItemCollection;
use App\Models\Category;
use Illuminate\Http\Request;

/**
 * Class CategoryControllerAPI for Category API methods.
 *
 * @package App\Http\Controllers\API
 */
class CategoryControllerAPI extends Controller
{
    /**
     * The index method returns categories in paginate format.
     *
     * @return CategoryCollection
     */
    public function index(): CategoryCollection
    {
        return new CategoryCollection(Category::all());
    }

    /**
     * Show method handles a single category showing.
     *
     * @param Category $category
     * @return CategoryResource
     */
    public function show(Category $category): CategoryResource
    {
        return new CategoryResource($category);
    }
}
