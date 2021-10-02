<?php

namespace App\Http\Middleware;

use App\Enums\Role;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class CheckUserAdministration for administration check.
 *
 * @package App\Http\Middleware
 */
class CheckUserAdministration
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::user() && Auth::user()->role == Role::ADMIN()) {
            return $next($request);
        }
        return back();
    }
}
