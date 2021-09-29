<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Internal\APIRequest;
use App\Http\Requests\CreateUpdateBrandRequest;
use App\Models\Brand;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
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
        $brands = Json::prettify(APIRequest::handle(route('api.all.brand')));

        return view('admin.route-views.brands')
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
        return view('create-brand-panel') // TODO: Create brand page
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
        Brand::query()->create($validated);

        // TODO: Insert image adding feature

        return redirect()->route('brand');
    }

    /**
     * Display the specified brand resource.
     *
     * @param Brand $brand
     * @return Application|Factory|View|Response
     */
    public function show(Brand $brand)
    {
        return view('show-brand')
            ->with('item', $brand)
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
        return view('edit-brand')
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

        // TODO: Add the photo updating feature

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
        $brand->delete();

        // TODO: Photo remove from storage

        return redirect()->route('brand');
    }
}
