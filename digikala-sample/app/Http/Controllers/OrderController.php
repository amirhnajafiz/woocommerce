<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUpdateCategoryRequest;
use App\Http\Requests\CreateUpdateOrderRequest;
use App\Models\Order;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param CreateUpdateOrderRequest $request
     * @return RedirectResponse
     */
    public function store(CreateUpdateOrderRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $cart_id = Auth::user()->cart_id;

        Order::query()->create([
            'cart_id' => $cart_id,
            'item_id' => $validated['item_id'],
            'number' => 1
        ]);

        return redirect()
            ->route('cart.show', $cart_id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Order $order
     * @return RedirectResponse
     */
    public function destroy(Order $order): RedirectResponse
    {
        $cart_id = $order->cart_id;
        $order->delete();

        return redirect()
            ->route('cart.show', $cart_id);
    }
}
