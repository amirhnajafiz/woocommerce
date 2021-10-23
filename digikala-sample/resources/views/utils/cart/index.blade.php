@section('title', __('-cart-') . $user->id)

<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    This is your cart, <strong>{{ $user->name }}</strong>
                </div>
            </div>
        </div>
    </div>
    <div class="p-12">
        @forelse($carts as $cart)
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="row m-0 p-6 bg-white border-b border-gray-200">
                        <div class="col-1">
                            {{ 'Status: ' . $cart->status }}
                        </div>
                        <div class="col-5">
                            {{ 'Orders: ' . $cart->orders->count() }}
                        </div>
                        <div class="col-2">
                            <a href="#">
                                Select
                            </a>
                        </div>
                        <div class="col-2">
                            <a href="{{ route('cart.show', $cart->id) }}" class="btn btn-primary">
                                Open
                            </a>
                        </div>
                        <div class="col-2">
                            <a href="#" class="btn btn-danger">
                                Delete
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        No carts yet, create one now.
                    </div>
                    <div class="p-6 bg-white border-b border-gray-200">
                        <a href="{{ route('cart.create') }}" class="btn btn-success">
                            Create new cart
                        </a>
                    </div>
                </div>
            </div>
        @endforelse
    </div>
</x-app-layout>
