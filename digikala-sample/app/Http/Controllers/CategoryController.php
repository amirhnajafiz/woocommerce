<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * Class CategoryController for category managements.
 *
 * @package App\Http\Controllers
 */
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $categories = Category::all();
        return \response()->json([
            'categories' => $categories
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
            'page' => 'Category Create'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateUpdateCategoryRequest $request
     * @return JsonResponse
     */
    public function store(CreateUpdateCategoryRequest $request): JsonResponse
    {
        $validated = $request->validated();
        $category = Category::query()->create($validated);

        if ($request->file('file')) {
            // TODO: Store file in storage and database
        }

        return \response()->json([
            'status' => 'OK',
            'id' => $category->id
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
        $category = Category::query()->findOrFail($id);
        return \response()->json([
            'category' => $category
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
        $category = Category::query()->findOrFail($id);
        return \response()->json([
            'category' => $category,
            'page' => 'Update'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CreateUpdateCategoryRequest $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(CreateUpdateCategoryRequest $request, int $id): JsonResponse
    {
        $category = Category::query()->findOrFail($id);
        $validated = $request->validated();

        $category->update($validated);

        if ($request->file('file')) {
            // TODO: Store file in storage and database
        }

        $category->save();

        return \response()->json([
            'status' => 'OK',
            'id' => $category->id,
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
        Category::query()->findOrFail($id)->delete();
        return \response()->json([
            'status' => 'OK',
            'item' => 'Delete'
        ]);
    }
}
