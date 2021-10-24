<?php

namespace App\Providers;

use App\Enums\Role;
use App\Enums\Status;
use App\Models\Cart;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Super admin all access
        Gate::before(function (User $user) {
            return $user->role == Role::SUPER_ADMIN();
        });

        // Super admin
        Gate::define('super-admin', function (User $user) {
           return $user->role == Role::SUPER_ADMIN();
        });

        // Admin panel access gate
        Gate::define('admin', function (User $user) {
            return $user->role == Role::ADMIN();
        });

        // Writer gate
        Gate::define('write',function (User $user) {
            return $user->role != Role::USER();
        });

        // Payable item check gate
        Gate::define('payable-cart', function (User $user, Cart $cart) {
            return $cart->status == Status::ORDER();
        });

        // User of the cart check
        Gate::define('own-cart', function (User $user, Cart $cart) {
            return  $user->id == $cart->user_id;
        });
    }
}
