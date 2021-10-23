@section('title', __('-user-cart-') . $cart->id)

<x-app-layout>
    <div class="py-12">
        @forelse($cart->orders as $order)
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 my-2">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="row m-0 p-6 bg-white border-b border-gray-200">
                        <div class="col-4">
                            {{ 'Item: ' . $order->item->name }}
                        </div>
                        <div class="col-8 row m-0">
                            <div class="col-8">
                                <form action="{{ route('order.update', $order->id) }}" method="post">
                                    @csrf
                                    @method('put')
                                    <label for="number">Number: </label>
                                    <input
                                        style="padding: 10px; width: 120px;"
                                        id="number"
                                        type="number"
                                        name="number"
                                        min="1"
                                        max="20"
                                        value="{{ $order->number }}"
                                    />
                                    <button type="submit" class="btn btn-dark">
                                        Update
                                    </button>
                                </form>
                            </div>
                            <div class="col-4">
                                <form action="{{ route('order.destroy', $order->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger">
                                        Remove
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        {{ $user->name }}, your cart is empty!
                    </div>
                </div>
            </div>
        @endforelse
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 my-2">
            <a href="{{ route('cart.index') }}" class="btn btn-primary">
                Back
            </a>
        </div>
    </div>
</x-app-layout>
