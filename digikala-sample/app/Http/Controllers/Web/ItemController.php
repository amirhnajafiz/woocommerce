<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUpdateItemRequest;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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
     * @return Response
     */
    public function index()
    {
        // TODO: Items page
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
