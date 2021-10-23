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
        @forelse(\Illuminate\Support\Facades\Auth::user()->carts as $cart)
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="row m-0 p-6 bg-white border-b border-gray-200">
                        <div class="col-6">
                            {{ \Illuminate\Support\Str::ucfirst($cart->status) }}
                        </div>
                        <div class="col-6">
                            Time: {{ $cart->updated_at }}
                        </div>
                    </div>
                </div>
            </div>
        @empty
        @endforelse
    </div>
</x-app-layout>
