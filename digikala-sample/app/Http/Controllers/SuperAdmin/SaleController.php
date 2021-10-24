<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUpdateSaleRequest;
use App\Models\Sale;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

/**
 * Class SaleController for managing sales.
 *
 * @package App\Http\Controllers\SuperAdmin
 */
class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        $sales = Sale::paginate(5);

        return view('admin.sale.index')
            ->with('sales', $sales);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateUpdateSaleRequest $request
     * @return RedirectResponse
     */
    public function store(CreateUpdateSaleRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $validated['code'] = Str::random(10);

        Sale::query()->create($validated);

        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CreateUpdateSaleRequest $request
     * @param Sale $sale
     * @return RedirectResponse
     */
    public function update(CreateUpdateSaleRequest $request, Sale $sale): RedirectResponse
    {
        $validated = $request->validated();

        $sale->update($validated);
        $sale->save();

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Sale $sale
     * @return RedirectResponse
     */
    public function destroy(Sale $sale): RedirectResponse
    {
        $sale->delete();
        return back();
    }
}
