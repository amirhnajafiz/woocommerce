<?php

namespace App\Http\Controllers;

use App\Http\Internal\APIRequest;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use PHPUnit\Util\Json;

/**
 * Class HomeController handles the home routes views.
 *
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{
    // TODO: Index page - User panel
    /**
     * Home page of the website.
     *
     * @throws Exception
     */
    public function index()
    {
        $categories = Json::prettify(APIRequest::handle(route('api.all.brand')));
        $items = Json::prettify(APIRequest::handle(route('api.all.item')));

        return view('') // TODO: Create welcome page
            ->with('title', 'home')
            ->with('categories', $categories)
            ->with('items', $items);
    }

    /**
     * Returning the login view.
     *
     * @return Application|Factory|View
     */
    public function login()
    {
        return view('') // TODO: Create login view
            ->with('title', '-login-page');
    }

    /**
     * Returning the register view.
     *
     * @return Application|Factory|View
     */
    public function register()
    {
        return view('') // TODO: Create register view
            ->with('title', '-register-page');
    }
}
