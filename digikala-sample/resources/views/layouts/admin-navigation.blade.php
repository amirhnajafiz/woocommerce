<div class="list-group bg-dark" style="height: 100vh;">
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
    <a href="#"
       class="list-group-item list-group-item-action px-5 py-3 bg-dark text-light disabled">
        <del> Users</del>
    </a>
    <a href="#"
       class="list-group-item list-group-item-action px-5 py-3 bg-dark text-light disabled">
        <del> Orders</del>
    </a>
    <a href="#"
       class="list-group-item list-group-item-action px-5 py-3 bg-dark text-light disabled">
        <del> Payments</del>
    </a>
    <a href="#"
       class="list-group-item list-group-item-action px-5 py-3 bg-dark text-light disabled">
        <del> Sale Codes</del>
    </a>
</div>
<a href="{{ route('dashboard') }}" class="list-group-item list-group-item-action px-5 py-3 text-center text-white rounded" style="background-color: #fd5a24 !important;">
    Exit
</a>
