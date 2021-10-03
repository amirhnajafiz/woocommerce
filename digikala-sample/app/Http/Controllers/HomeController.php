<?php

namespace App\Http\Controllers;

use App\Http\Internal\APIRequest;
use App\Models\Item;
use App\Models\SpecialItem;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use PHPUnit\Util\Json;

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
     * @param string $filter
     * @param string $mode
     * @return Application|Factory|View
     */
    public function index(string $filter='id', string $mode='asc')
    {
        $items = Item::query()->orderBy($filter, $mode)->paginate(5);
        $specials = SpecialItem::query()->get()->random(5);

        return view('welcome')
            ->with('title', 'home')
            ->with('specials', $specials)
            ->with('items', $items);
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
}
