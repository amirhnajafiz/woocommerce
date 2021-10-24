<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Requests\AdminUpdateCartRequest;
use App\Models\Cart;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller;

/**
 * Class AdminCartController for managing orders.
 *
 * @package App\Http\Controllers\SuperAdmin
 */
class AdminCartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $carts = Cart::paginate(4);

        return view('admin.cart.index')
            ->with('carts', $carts);
    }

    /**
     * Handling the cart modification.
     *
     * @param AdminUpdateCartRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(AdminUpdateCartRequest $request, $id): RedirectResponse
    {
        $validated = $request->validated();
        $cart = Cart::query()
            ->findOrFail($id);

        $cart->update([
            'status' => $validated['status']
        ]);
        $cart->save();

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        Cart::query()->findOrFail($id)->delete();
        return redirect()
            ->route('admin-cart.index');
    }
}
