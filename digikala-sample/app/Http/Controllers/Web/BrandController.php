<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Files\FileManager;
use App\Http\Requests\CreateUpdateBrandRequest;
use App\Models\Brand;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use PHPUnit\Util\Json;

/**
 * Class BrandController handles the brand base methods.
 *
 * @package App\Http\Controllers\Web
 */
class BrandController extends Controller
{
    /**
     * Display a listing of the brands resource.
     *
     * @return Application|Factory|View|Response
     * @throws Exception
     */
    public function index()
    {
        $brands = Brand::paginate(2);

        return view('web.admin.route-views.brands')
            ->with('brands', $brands)
            ->with('title', '-all-brands');
    }

    /**
     * Show the form for creating a new brand resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        return view('web.admin.utils.brand.create-brand-panel')
            ->with('title', '-create-brand');
    }

    /**
     * Store a newly created brand resource in storage.
     *
     * @param CreateUpdateBrandRequest $request
     * @return RedirectResponse|Response
     */
    public function store(CreateUpdateBrandRequest $request)
    {
        $validated = $request->validated();
        $brand = Brand::query()->create($validated);

        FileManager::instance()->storeFile('store/brand/', $brand->id, $request->file('file'));
        $brand->image()->create([
            'title' => $brand->name,
            'slug' => $brand->slug,
            'path' => 'store/brand' . $brand->id
        ]);

        return redirect()->route('brand.show', $brand);
    }

    /**
     * Display the specified brand resource.
     *
     * @param Brand $brand
     * @return Application|Factory|View|Response
     */
    public function show(Brand $brand)
    {
        return view('web.admin.utils.brand.show-brand')
            ->with('brand', $brand)
            ->with('title', '-brand-' . $brand->id);
    }

    /**
     * Show the form for editing the specified brand resource.
     *
     * @param Brand $brand
     * @return Application|Factory|View|Response
     */
    public function edit(Brand $brand)
    {
        return view('web.admin.utils.brand.edit-brand')
            ->with('brand', $brand)
            ->with('title', '-edit-brand-' . $brand->id);
    }

    /**
     * Update the specified brand resource in storage.
     *
     * @param CreateUpdateBrandRequest $request
     * @param Brand $brand
     * @return RedirectResponse|Response
     */
    public function update(CreateUpdateBrandRequest $request, Brand $brand)
    {
        $validated = $request->validated();
        $brand->update($validated);

        if ($request->has('file')) {
            $path = $brand->image->path;
            FileManager::instance()->replaceFile('store/brand/', $brand->id, $request->file('file'), $path);
        }

        $brand->save();

        return redirect()->route('brand.show', $brand);
    }

    /**
     * Remove the specified brand resource from storage.
     *
     * @param Brand $brand
     * @return RedirectResponse|Response
     */
    public function destroy(Brand $brand)
    {
        FileManager::instance()->removeFile($brand->image->path);
        $brand->delete();

        return redirect()->route('brand.index');
    }
}
