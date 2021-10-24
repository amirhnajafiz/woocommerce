<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUpdateSaleRequest;
use App\Models\Sale;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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
     * @return Response
     */
    public function store(CreateUpdateSaleRequest $request)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CreateUpdateSaleRequest $request
     * @param Sale $sale
     * @return Response
     */
    public function update(CreateUpdateSaleRequest $request, Sale $sale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Sale $sale
     * @return Response
     */
    public function destroy(Sale $sale)
    {
        //
    }
}
