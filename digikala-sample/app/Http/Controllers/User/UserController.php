<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUpdateUserRequest;
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
    /**
     * Handles the user login.
     *
     * @param CreateUpdateUserRequest $request
     * @return RedirectResponse
     */
    public function login(CreateUpdateUserRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $credentials = $validated('phone', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard');
        }

        // TODO: If failed return to login
        return redirect();
    }

    /**
     * Handles the user registration.
     *
     * @param CreateUpdateUserRequest $request
     * @return Application|RedirectResponse|Redirector
     */
    public function register(CreateUpdateUserRequest $request)
    {
        User::query()->create($request->validated());

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
