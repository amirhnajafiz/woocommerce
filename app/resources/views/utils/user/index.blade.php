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
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart3 inline-block" viewBox="0 0 16 16">
                                    <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @empty
        @endforelse
    </div>
</x-app-layout>
