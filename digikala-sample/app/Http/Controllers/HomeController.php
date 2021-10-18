<?php

namespace App\Http\Controllers;

use App\Http\Requests\HomePageRequest;
use App\Models\Item;
use App\Models\SpecialItem;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

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
     * @param HomePageRequest $request
     * @return Application|Factory|View
     */
    public function index(HomePageRequest $request)
    {
        $validated = $request->validated();

        $items = Item::query()
            ->orderBy($validated['filter'], $validated['mode'])
            ->paginate(10);

        $specials = SpecialItem::query()
            ->get()
            ->random(5);

        return view('welcome')
            ->with('title', 'home') // TODO: Title fix
            ->with('special', $specials)
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

        return view('web.special')
            ->with('title', 'special')
            ->with('special', $specials)
            ->with('items', $specials);
    }
}
