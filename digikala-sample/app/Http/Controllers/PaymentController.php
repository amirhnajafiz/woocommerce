<?php

namespace App\Http\Controllers;

use App\Enums\Status;
use App\Http\Requests\PaymentRequest;
use App\Models\Cart;
use App\Models\Payment;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

/**
 * Class PaymentController for handling the user payment.
 *
 * @package App\Http\Controllers
 */
class PaymentController extends Controller
{
    /**
     * The index page is the payment page.
     *
     * @param Cart $cart the current cart for payment
     * @return View
     */
    public function index(Cart $cart): View
    {
        $addresses = Auth::user()->addresses;

        return view('utils.payment.index')
            ->with('addresses', $addresses)
            ->with('cart', $cart)
            ->with('user', Auth::user());
    }

    /**
     * The pay method for handling the payment functionality.
     *
     * @param PaymentRequest $request
     * @param Cart $cart the current cart
     * @return RedirectResponse
     */
    public function pay(PaymentRequest $request, Cart $cart): RedirectResponse
    {
        $validated = $request->validated();
        $status = true;
        $total = 0;

        foreach ($cart->orders as $order) {
            if ($order->number > $order->item->number) {
                $status = false;
            }
            $total += $order->number * $order->item->price;
        }

        DB::transaction(function () use ($validated, $cart, $status, $total) {
            if ($status) {
                Payment::query()
                    ->create([
                        'cart_id' => $cart->id,
                        'amount' => $total,
                        'bank' => $validated['bank']
                    ]);

                foreach ($cart->orders as $order) {
                    $order->item
                        ->update([
                            'number' => $order->item->number - $order->number
                        ]);
                    $order->save();
                }

                $cart->update([
                    'status' => Status::READY()
                ]);
                $cart->save();
            } else {
                $cart->update([
                    'status' => Status::STORE_FAIL()
                ]);
                $cart->save();
            }
        });

        return redirect()
            ->route('cart.index');
    }
}
