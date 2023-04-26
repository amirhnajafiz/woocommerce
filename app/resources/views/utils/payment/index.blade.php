@section('title', __('-cart-') . $user->id)

<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    History of your payments, <strong>{{ $user->name }}</strong>
                </div>
            </div>
        </div>
    </div>
    <div class="p-12">
        @forelse($payments->sortBy('updated_at') as $payment)
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 my-1 py-2 shadow">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="row m-0 py-2">
                        <div class="col-5 px-4 pt-2">
                            Date: {{ $payment->created_at }}
                        </div>
                        <div class="col-5 px-4 pt-2">
                            Bank: {{ $payment->bank }}
                        </div>
                        <div class="col-2">
                            <a href="{{ route('payment.show', $payment->id) }}" class="btn btn-dark" style="width: 150px;">
                                View
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-zoom-in inline-block" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
                                    <path d="M10.344 11.742c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1 6.538 6.538 0 0 1-1.398 1.4z"/>
                                    <path fill-rule="evenodd" d="M6.5 3a.5.5 0 0 1 .5.5V6h2.5a.5.5 0 0 1 0 1H7v2.5a.5.5 0 0 1-1 0V7H3.5a.5.5 0 0 1 0-1H6V3.5a.5.5 0 0 1 .5-.5z"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        No payments.
                    </div>
                </div>
            </div>
        @endforelse
    </div>
</x-app-layout>
