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
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 my-1 py-2 shadow">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div
                        class="row m-0 p-6 {{ $user->cart_id == $cart->id ? 'bg-success text-light' : 'bg-white' }} border-gray-200">
                        <div class="col-2">
                            {{ 'Status: ' . $cart->status }}
                        </div>
                        <div class="col-6">
                            {{ 'Orders: ' . $cart->orders->count() }}
                        </div>
                        <div class="col-4 row m-0">
                            @if($cart->status == \App\Enums\Status::ORDER())
                                <div class="col-4">
                                    <form action="{{ route('cart.update', $cart->id) }}" method="post">
                                        @csrf
                                        @method('put')
                                        <input
                                            type="hidden"
                                            name="mode"
                                            value="{{ $user->cart_id != $cart->id ? 'select' : 'unselect' }}"
                                        />
                                        <button type="submit" class="btn btn-warning">
                                            {{ $user->cart_id == $cart->id ? 'Unselect' : 'Select' }}
                                        </button>
                                    </form>
                                </div>
                                <div class="col-4">
                                    <a href="{{ route('cart.show', $cart->id) }}" class="btn btn-primary">
                                        Open
                                    </a>
                                </div>
                                <div class="col-4">
                                    <form action="{{ route('cart.destroy', $cart->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            @endif
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
                </div>
            </div>
        @endforelse
    </div>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-6">
        <form action="{{ route('cart.store') }}" method="post">
            @csrf
            <button type="submit" class="btn btn-success">
                Create new cart
            </button>
        </form>
    </div>
</x-app-layout>
