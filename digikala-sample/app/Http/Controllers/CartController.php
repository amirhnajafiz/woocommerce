<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateCartRequest;
use App\Models\Cart;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

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
        $carts = Auth::user()->carts;
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
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
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
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
