<?php

namespace App\Http\Controllers\Web;

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
use Illuminate\Support\Str;
use PHPUnit\Util\Json;

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

        return view('web.admin.route-views.categories')
            ->with('categories', $categories)
            ->with('title', '-all-categories');
    }

    /**
     * Show the form for creating a new category resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        return view('web.utils.category.create-category-panel')
            ->with('title', '-create-category');
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
        $category = Category::query()->create($validated);

        FileManager::instance()->storeFile('store/category/', $category->id, $request->file('file'));
        $category->image()->create([
            'title' => $category->name,
            'slug' => Str::slug($category->name),
            'path' => 'store/category/' . $category->id
        ]);

        return redirect()->route('category.show', $category);
    }

    /**
     * Display the specified category resource.
     *
     * @param Category $category
     * @return Application|Factory|View|Response
     */
    public function show(Category $category)
    {
        return view('web.utils.category.show-category')
            ->with('category', $category)
            ->with('title', '-category-' . $category->id);
    }

    /**
     * Show the form for editing the specified category resource.
     *
     * @param Category $category
     * @return Application|Factory|View|Response
     */
    public function edit(Category $category)
    {
        return view('web.utils.category.edit-category')
            ->with('category', $category)
            ->with('title', '-edit-category-' . $category->id);
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
            FileManager::instance()->replaceFile('store/brand/', $category->id, $request->file('file'), $path);
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
