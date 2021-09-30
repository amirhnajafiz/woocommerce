<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

/**
 * Class AdminController will manage the admin features.
 *
 * @package App\Http\Controllers\User
 */
class AdminController extends Controller
{
    /**
     * Handling admin homepage.
     *
     */
    public function index()
    {
        return view('web.admin.route-views.welcome')
            ->with('title', '-admin-panel');
    }
}
