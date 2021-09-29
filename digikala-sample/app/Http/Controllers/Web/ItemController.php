<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUpdateItemRequest;
use App\Models\Item;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class ItemController will handle the items methods.
 *
 * @package App\Http\Controllers\Web
 */
class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     * @throws Exception
     */
    public function index()
    {
        $request = Request::create(route('api.all.item'), 'get');
        $brands = app()->handle($request)->getContent();
        $brands = json_encode(json_decode($brands), JSON_PRETTY_PRINT);

        return view('all-item-panel') // TODO: Create all items view
            ->with('brands', $brands)
            ->with('title', '-all-brands');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        // TODO: Create item page
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateUpdateItemRequest $request
     * @return Response
     */
    public function store(CreateUpdateItemRequest $request)
    {
        // TODO: Do the item creation
    }

    /**
     * Display the specified resource.
     *
     * @param Item $item
     * @return Response
     */
    public function show(Item $item)
    {
        // TODO: Create single item page
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Item $item
     * @return Response
     */
    public function edit(Item $item)
    {
        // TODO: Create item edit page
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CreateUpdateItemRequest $request
     * @param Item $item
     * @return Response
     */
    public function update(CreateUpdateItemRequest $request, Item $item)
    {
        // TODO: Do the updating
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Item $item
     * @return Response
     */
    public function destroy(Item $item)
    {
        // TODO: Do the item deleting
    }
}
