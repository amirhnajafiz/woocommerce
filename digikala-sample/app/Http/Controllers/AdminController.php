<?php

namespace App\Http\Controllers;


use App\Models\Category;
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
     * Categories panel view.
     *
     * @return Application|Factory|View
     */
    public function category()
    {
        $categories = Category::all();
        return view('admin.route-views.categories')
            ->with('title', 'categories')
            ->with('categories', $categories->toJson(JSON_PRETTY_PRINT));
    }
}
