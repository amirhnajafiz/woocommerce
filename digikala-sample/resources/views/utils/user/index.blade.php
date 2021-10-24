@section('title', __('-dashboard'))

<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in dear <strong>{{ \Illuminate\Support\Facades\Auth::user()->name }}</strong>
                </div>
            </div>
        </div>
    </div>
    <div class="py-12">
        @forelse(\Illuminate\Support\Facades\Auth::user()->carts->sortByDesc('updated_at') as $cart)
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 my-2">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="row m-0 p-6 bg-white border-b border-gray-200">
                        <div class="col-4">
                            <span class="rounded p-2 text-white {{ $cart->status == \App\Enums\Status::FAILED() || $cart->status == \App\Enums\Status::STORE_FAIL() ? 'bg-danger' : 'bg-success' }}">
                                {{ \Illuminate\Support\Str::ucfirst($cart->status) }}
                            </span>
                        </div>
                        <div class="col-4">
                            Time: {{ $cart->updated_at }}
                        </div>
                        <div class="col-4">
                            <a href="{{ route('cart.show', $cart->id) }}" class="btn btn-dark">
                                Cart
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @empty
        @endforelse
    </div>
</x-app-layout>
