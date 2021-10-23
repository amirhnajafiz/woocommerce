@section('title', __('-user-cart-') . $cart->id)

<x-app-layout>
    <div class="py-12">
        @forelse($cart->orders as $order)
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 my-2">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="row m-0 p-6 bg-white border-b border-gray-200">
                        <div class="col-10">
                            {{ 'Item: ' . $order->item->name }}
                        </div>
                        <div class="col-2">
                            {{ 'Number: ' . $order->number }}
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
    </div>
</x-app-layout>
