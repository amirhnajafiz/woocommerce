<?php

namespace App\Http\Controllers;

use App\Http\Internal\APIRequest;
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
     * @throws Exception
     */
    public function index()
    {
        $items = Json::prettify(APIRequest::handle(route('api.all.item')));

        return view('web.home')
            ->with('title', 'home')
            ->with('items', $items);
    }

    /**
     * Returning the login view.
     *
     * @return Application|Factory|View
     */
    public function login()
    {
        return view('web.auth.login')
            ->with('title', '-login-page');
    }

    /**
     * Returning the register view.
     *
     * @return Application|Factory|View
     */
    public function register()
    {
        return view('web.auth.register')
            ->with('title', '-register-page');
    }

    /**
     * User panel view.
     *
     * @return Application|Factory|View
     */
    public function userPanel()
    {
        return view('web.user.main')
            ->with('title', '-user-panel')
            ->with('user', Auth::user());
    }
}
