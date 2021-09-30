<div class="list-group">
    <a href="{{ route('brand.index') }}"
       class="list-group-item list-group-item-action px-5 py-3 text-center {{ request()->routeIs('api.all.brand') ? 'bg-primary text-white' : 'bg-white text-dark' }}">
        Brands / Companies
    </a>
    <a href="{{ route('category.index') }}"
       class="list-group-item list-group-item-action px-5 py-3 text-center {{ request()->routeIs('api.all.category') ? 'bg-primary text-white' : 'bg-white text-dark' }}">
        Categories
    </a>
    <a href="{{ route('item.index') }}"
       class="list-group-item list-group-item-action px-5 py-3 text-center {{ request()->routeIs('api.all.item') ? 'bg-primary text-white' : 'bg-white text-dark' }}">
        Items
    </a>
    <a href="{{ route('all.special') }}"
       class="list-group-item list-group-item-action px-5 py-3 text-center {{ request()->routeIs('api.all.special') ? 'bg-primary text-white' : 'bg-white text-dark' }}">
        Special Items
    </a>
    <a href="#"
       class="list-group-item list-group-item-action px-5 py-3 text-center bg-white text-dark disabled">
        <del> Users</del>
    </a>
    <a href="#"
       class="list-group-item list-group-item-action px-5 py-3 text-center bg-white text-dark disabled">
        <del> Orders</del>
    </a>
    <a href="#"
       class="list-group-item list-group-item-action px-5 py-3 text-center bg-white text-dark disabled">
        <del> Payments</del>
    </a>
    <a href="#"
       class="list-group-item list-group-item-action px-5 py-3 text-center bg-white text-dark disabled">
        <del> Sale Codes</del>
    </a>
    <a href="#" class="list-group-item list-group-item-action px-5 py-3 text-center bg-danger text-white disabled">
        <del> Logout</del>
    </a>
</div>
