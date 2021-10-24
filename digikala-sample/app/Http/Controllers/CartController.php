<?php

namespace App\Http\Controllers;

use App\Enums\Status;
use App\Http\Requests\UpdateCartRequest;
use App\Models\Cart;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

/**
 * Class CartController for managing user carts.
 *
 * @package App\Http\Controllers
 */
class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $carts = Auth::user()->carts
            ->filter(function ($cart) {
               return
                   $cart->status == Status::ORDER() ||
                   $cart->status == Status::READY() ||
                   $cart->status == Status::SEND();
            });

        return view('utils.cart.index')
            ->with('carts', $carts)
            ->with('user', Auth::user());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return RedirectResponse
     */
    public function store(): RedirectResponse
    {
        Cart::query()
            ->create([
                'user_id' => Auth::id()
            ]);
        return redirect()
            ->route('cart.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Cart $cart
     * @return View|RedirectResponse
     */
    public function show(Cart $cart)
    {
        if (!Gate::check('own-cart', [$cart]) && !Gate::check('admin')) {
            return redirect()->route('cart.index');
        }

        return view('utils.cart.show')
            ->with('cart', $cart)
            ->with('user', Auth::user());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateCartRequest $request
     * @param Cart $cart
     * @return RedirectResponse
     */
    public function update(UpdateCartRequest $request, Cart $cart): RedirectResponse
    {
        $validated = $request->validated();

        if (!Gate::check('payable-cart')) {
            return redirect()->route('cart.index');
        }

        $user = Auth::user();
        $user->update([
                'cart_id' => $validated['mode'] == 'select' ? $cart->id : null
            ]);
        $user->save();

        return redirect()
            ->route('cart.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Cart $cart
     * @return RedirectResponse
     */
    public function destroy(Cart $cart): RedirectResponse
    {
        $cart->delete();
        return redirect()
            ->route('cart.index');
    }
}
