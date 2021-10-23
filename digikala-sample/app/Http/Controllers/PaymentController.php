<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
     * @param Request $request
     * @param Cart $cart the current cart
     */
    public function pay(Request $request, Cart $cart)
    {

    }
}
