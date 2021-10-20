<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Http\Files\FileManager;
use App\Http\Requests\CreateUpdateCategoryRequest;
use App\Models\Category;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

/**
 * Class CategoryController handles the categories methods.
 *
 * @package App\Http\Controllers\Web
 */
class CategoryController extends Controller
{
    /**
     * Display a listing of the categories resource.
     *
     * @return Application|Factory|View|Response
     * @throws Exception
     */
    public function index()
    {
        $categories = Category::paginate(2);

        return view('admin.category.index')
            ->with('categories', $categories);
    }

    /**
     * Show the form for creating a new category resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.category.create')
            ->with('categories', $categories);
    }

    /**
     * Store a newly created category resource in storage.
     *
     * @param CreateUpdateCategoryRequest $request
     * @return RedirectResponse|Response
     */
    public function store(CreateUpdateCategoryRequest $request)
    {
        $validated = $request->validated();

        DB::transaction(function () use ($request, $validated) {
            $category = Category::query()->create($validated);

            if ($request->has('file')) {
                $name = 'file' . $category->id;
                FileManager::instance()
                    ->storeFile('store/category/', $name, $request->file('file'));
                $category->image()->create([
                    'title' => $category->name,
                    'alt' => Str::slug($category->name),
                    'path' => './storage/store/category/' . $name
                ]);
            }
        });

        return redirect()->route('category.index');
    }

    /**
     * Display the specified category resource.
     *
     * @param Category $category
     * @return Application|Factory|View|Response
     */
    public function show(Category $category)
    {
        return view('utils.category.show')
            ->with('category', $category);
    }

    /**
     * Show the form for editing the specified category resource.
     *
     * @param Category $category
     * @return Application|Factory|View|Response
     */
    public function edit(Category $category)
    {
        return view('admin.category.edit')
            ->with('category', $category);
    }

    /**
     * Update the specified category resource in storage.
     *
     * @param CreateUpdateCategoryRequest $request
     * @param Category $category
     * @return RedirectResponse|Response
     */
    public function update(CreateUpdateCategoryRequest $request, Category $category)
    {
        $validated = $request->validated();
        $category->update($validated);

        if ($request->has('file')) {
            $path = $category->image->path;
            FileManager::instance()->replaceFile('store/category/', $category->id, $request->file('file'), $path);
        }

        $category->save();

        return redirect()->route('category.show', $category);
    }

    /**
     * Remove the specified category resource from storage.
     *
     * @param Category $category
     * @return RedirectResponse|Response
     */
    public function destroy(Category $category)
    {
        FileManager::instance()->removeFile($category->image->path);
        $category->delete();

        return redirect()->route('category.index');
    }
}
