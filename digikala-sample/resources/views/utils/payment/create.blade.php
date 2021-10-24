@section('title', __('-payment'))

<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="h3 p-6">
                    Payment page
                </div>
                @foreach($cart->orders as $order)
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
                <form action="{{ route('payment.store') }}" method="post">
                    @csrf
                    <input type="hidden" name="cart_id" value="{{ $cart->id }}" />
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 my-2">
                        <label for="address" class="h4 p-6">
                            Select an address
                        </label>
                        <select id="address" name="address_id">
                            @forelse($addresses as $address)
                                <option value="{{ $address->id }}">
                                    {{ $address->state . ' - ' . $address->city . ' -- ' . $address->address }}
                                </option>
                            @empty
                                <option value="">
                                    {{ __('-- none --') }}
                                </option>
                            @endforelse
                        </select>
                    </div>
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 my-2">
                        <label for="bank" class="h4 p-6">
                            Choose your bank portal
                        </label>
                        <select id="bank" name="bank">
                            <option value="AK-Bank">
                                AK Bank
                            </option>
                            <option value="National-Bank">
                                National Bank
                            </option>
                            <option value="Iran-Bank">
                                Iran Bank
                            </option>
                        </select>
                    </div>
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 my-2 text-center">
                        <a href="{{ route('cart.index') }}" class="btn btn-danger">
                            Back
                        </a>
                        <button type="submit" class="btn btn-success">
                            Pay
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
