<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\SpecialItem;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class HomeController handles the home routes views.
 *
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{
    /**
     * Home page of the website.
     *
     * @param Request $request
     * @return Application|Factory|View
     */
    public function index(Request $request) // TODO: Form request
    {
        $items = Item::query()
            ->orderBy($request->get('filter', 'id'), $request->get('mode', 'asc'))
            ->paginate(10);
        $specials = SpecialItem::query()->get()->random(5);

        return view('welcome')
            ->with('title', 'home') // TODO: Title fix
            ->with('specials', $specials)
            ->with('items', $items);
    }

    /**
     * Special items view.
     *
     * @return Application|Factory|View
     */
    public function specials()
    {
        $specials = SpecialItem::paginate(10);

        return view('web.specials')
            ->with('title', 'specials')
            ->with('specials', $specials)
            ->with('items', $specials);
    }

    /**
     * User panel view.
     *
     * @return Application|Factory|View
     */
    public function userPanel()
    {
        return view('dashboard')
            ->with('title', '-user-panel')
            ->with('user', Auth::user());
    }

    /**
     * User cart view.
     *
     * @return Application|Factory|View
     */
    public function userCart()
    {
        return view('web.user.cart')
            ->with('title', '-user-cart')
            ->with('user', Auth::user());
    }
}
