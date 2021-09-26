<?php

namespace App\Http\Controllers;


use App\Models\Brand;
use App\Models\Category;
use App\Models\Item;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Sale;
use App\Models\SpecialItem;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Client\Request;

/**
 * Class AdminController for admin features.
 *
 * @package App\Http\Controllers
 */
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('admin.main')
            ->with('title', 'main-panel');
    }

    /**
     * Brands panel view.
     *
     * @return Application|Factory|View
     */
    public function brands()
    {
        $brands = Brand::query()->paginate(2);
        return view('admin.route-views.brands')
            ->with('title', 'brands')
            ->with('brands', $brands->toJson(JSON_PRETTY_PRINT));
    }

    /**
     * Categories panel view.
     *
     * @return Application|Factory|View
     */
    public function categories()
    {
        $categories = Category::query()->paginate(2);
        return view('admin.route-views.categories')
            ->with('title', 'categories')
            ->with('categories', $categories->toJson(JSON_PRETTY_PRINT));
    }

    /**
     * Brands panel view.
     *
     * @return Application|Factory|View
     */
    public function items()
    {
        $item = Item::query()->paginate(2);
        return view('admin.route-views.items')
            ->with('title', 'items')
            ->with('items', $item->toJson(JSON_PRETTY_PRINT));
    }

    /**
     * Brands panel view.
     *
     * @return Application|Factory|View
     */
    public function specials()
    {
        $item = SpecialItem::query()->getRelation('item')->paginate(2);
        return view('admin.route-views.specials')
            ->with('title', 'items-special')
            ->with('items', $item->toJson(JSON_PRETTY_PRINT));
    }

    /**
     * Brands panel view.
     *
     * @return Application|Factory|View
     */
    public function users()
    {
        $users = User::query()->paginate(2);
        return view('admin.route-views.users')
            ->with('title', 'users')
            ->with('users', $users->toJson(JSON_PRETTY_PRINT));
    }

    /**
     * Brands panel view.
     *
     * @return Application|Factory|View
     */
    public function orders()
    {
        $orders = Order::query()->paginate(2);
        return view('admin.route-views.orders')
            ->with('title', 'orders')
            ->with('orders', $orders->toJson(JSON_PRETTY_PRINT));
    }

    /**
     * Brands panel view.
     *
     * @return Application|Factory|View
     */
    public function payments()
    {
        $payments = Payment::query()->paginate(2);
        return view('admin.route-views.payments')
            ->with('title', 'payments')
            ->with('payments', $payments->toJson(JSON_PRETTY_PRINT));
    }

    /**
     * Brands panel view.
     *
     * @return Application|Factory|View
     */
    public function sales()
    {
        $sales = Sale::query()->paginate(2);
        return view('admin.route-views.sales')
            ->with('title', 'sales')
            ->with('sales', $sales->toJson(JSON_PRETTY_PRINT));
    }
}
