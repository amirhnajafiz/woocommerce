<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // TODO: Index page - User panel
    /**
     * Returning the login view.
     *
     * @return Application|Factory|View
     */
    public function login()
    {
        return view('')
            ->with('title', '-login-page');
    }

    /**
     * Returning the register view.
     *
     * @return Application|Factory|View
     */
    public function register()
    {
        return view('')
            ->with('title', '-register-page');
    }
}
