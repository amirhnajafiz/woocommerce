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
                        <div class="col-10 h5 px-4 pt-2">
                            {{ $payment->created_at }}
                        </div>
                        <div class="col-2">
                            <a href="{{ route('payment.show', $payment->id) }}" class="btn btn-dark">
                                View
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
