<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUpdateOrderRequest;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

/**
 * Class OrderController for managing the orders of cart.
 *
 * @package App\Http\Controllers
 */
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

        $orders = Cart::query()
            ->findOrFail($cart_id)
            ->orders;

        $check_history = $orders
            ->keyBy('item_id')
            ->has($validated['item_id']);

        if ($check_history) {
            $order = $orders->filter(function ($order) use ($validated) {
                    return $order->item_id == $validated['item_id'];
                })
                ->first();
            $order->update([
                'number' => $order->number < 21 ? $order->number + 1 : $order->number,
            ]);
            $order->save();
        } else {
            Order::query()
                ->create([
                    'cart_id' => $cart_id,
                    'item_id' => $validated['item_id'],
                    'number' => 1
                ]);
        }

        return redirect()
            ->route('cart.show', $cart_id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CreateUpdateOrderRequest $request
     * @param Order $order
     * @return RedirectResponse
     */
    public function update(CreateUpdateOrderRequest $request, Order $order): RedirectResponse
    {
        $validated = $request->validated();

        $order->update([
           'number' => $validated['number']
        ]);

        return redirect()
            ->back();
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
