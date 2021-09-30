<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;

/**
 * Class UserController handles the user basic features.
 *
 * @package App\Http\Controllers\User
 */
class UserController extends Controller
{
    // TODO: Login - Register - Logout
    /**
     * Handles the user login.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function login(Request $request): RedirectResponse
    {
        // TODO: Request validation
        $credentials = $request->only('email', 'password');

        // TODO: Login by Phone
        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard');
        }

        // TODO: If failed return to login
        return redirect();
    }

    /**
     * Handles the user registration.
     *
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     */
    public function register(Request $request)
    {
        // TODO: Request Validate
        User::query()->create($request->all());

        // TODO: If success redirect to login
        return redirect();
    }

    /**
     * Manages the logging out feature.
     *
     * @return Application|RedirectResponse|Redirector
     */
    public function logout()
    {
        Auth::logout();
        return redirect(); // TODO: Redirect to home page
    }
}
