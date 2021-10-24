<div class="list-group bg-dark" style="height: 100vh;">
    @if(\Illuminate\Support\Facades\Auth::user()->role == \App\Enums\Role::SUPER_ADMIN())
        <a href="{{ route('user.index') }}"
           class="list-group-item list-group-item-action px-5 py-3 {{ request()->routeIs('user.index') ? 'bg-primary text-white' : 'bg-dark text-light' }}">
            Users
        </a>
    @endif
    @if(\Illuminate\Support\Facades\Auth::user()->role == \App\Enums\Role::SUPER_ADMIN() || \Illuminate\Support\Facades\Auth::user()->role == \App\Enums\Role::ADMIN() || \Illuminate\Support\Facades\Auth::user()->role == \App\Enums\Role::WRITER())
        <a href="{{ route('brand.index') }}"
           class="list-group-item list-group-item-action px-5 py-3 {{ request()->routeIs('brand.index') ? 'bg-primary text-white' : 'bg-dark text-light' }}">
            Brands / Companies
        </a>
        <a href="{{ route('category.index') }}"
           class="list-group-item list-group-item-action px-5 py-3 {{ request()->routeIs('category.index') ? 'bg-primary text-white' : 'bg-dark text-light' }}">
            Categories
        </a>
        <a href="{{ route('item.index') }}"
           class="list-group-item list-group-item-action px-5 py-3 {{ request()->routeIs('item.index') ? 'bg-primary text-white' : 'bg-dark text-light' }}">
            Items
        </a>
        <a href="{{ route('special.index') }}"
           class="list-group-item list-group-item-action px-5 py-3 {{ request()->routeIs('special.index') ? 'bg-primary text-white' : 'bg-dark text-light' }}">
            Special Items
        </a>
    @endif
    @if(\Illuminate\Support\Facades\Auth::user()->role == \App\Enums\Role::SUPER_ADMIN() || \Illuminate\Support\Facades\Auth::user()->role == \App\Enums\Role::ADMIN())
        <a href="{{ route('admin-cart.index') }}"
           class="list-group-item list-group-item-action px-5 py-3 {{ request()->routeIs('admin-cart.index') ? 'bg-primary text-white' : 'bg-dark text-light' }}">
            Carts
        </a>
        <a href="{{ route('admin-payment.index') }}"
           class="list-group-item list-group-item-action px-5 py-3 {{ request()->routeIs('admin-payment.index') ? 'bg-primary text-white' : 'bg-dark text-light' }}">
            Payments
        </a>
        <a href="{{ route('sale.index') }}"
           class="list-group-item list-group-item-action px-5 py-3 {{ request()->routeIs('sale.index') ? 'bg-primary text-white' : 'bg-dark text-light' }}">
            Sales
        </a>
    @endif
</div>
<a href="{{ route('dashboard') }}"
   class="list-group-item list-group-item-action px-5 py-3 text-center text-white rounded"
   style="background-color: #fd5a24 !important;">
    Exit
</a>
