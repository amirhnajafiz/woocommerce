@section('title', __('-payment-archive'))

<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="h3 p-6">
                    Payment for {{ $payment->cart->user->name }}
                </div>
                @foreach($payment->cart->orders as $order)
                    <div class="row m-0 p-6 bg-white border-b border-gray-200">
                        <div class="col-6">
                            Product: {{ $order->item->name }}
                        </div>
                        <div class="col-2">
                            Number of item: {{ $order->number }}
                        </div>
                        <div class="col-2">
                            Price: {{ $order->item->price }} $
                        </div>
                        <div class="col-2 border-l border-gray-200">
                            Total Price: {{ $order->number * $order->item->price }} $
                        </div>
                    </div>
                @endforeach
                <div class="row m-0 p-6 bg-white border-b border-gray-200">
                    <span class="text-right px-7">
                        Total price: {{ $total }} $
                    </span>
                </div>
                <div class="row m-0 p-6 bg-white border-b border-gray-200">
                    <div>
                        Bank: {{ $payment->bank }}
                    </div>
                    <div>
                        Date: {{ $payment->created_at }}
                    </div>
                    <div>
                        Amount: {{ $payment->amount }} $
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
