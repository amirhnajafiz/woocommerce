<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

/**
 * Class UserController manages the user abilities and features.
 *
 * @package App\Http\Controllers
 */
class UserController extends Controller
{
    /**
     * Showing a single item to user.
     *
     * @param Item $item
     * @return Application|Factory|View
     */
    public function showItem(Item $item)
    {
        return view('web.utils.item.show')
            ->with('title', '-item-' . $item->id)
            ->with('item', $item);
    }
}
