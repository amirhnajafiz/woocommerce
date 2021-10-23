@section('title', __('-address-panel'))

<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    This is your address panel, <strong>{{ \Illuminate\Support\Facades\Auth::user()->name }}</strong>
                </div>
            </div>
        </div>
    </div>
    <div class="p-12">
        @forelse($addresses as $address)
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-2">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="row m-0 p-6 bg-white border-b border-gray-200">
                        <div class="col-6">
                            <div class="row m-0 h4">
                                {{ $address->state . ' - ' . $address->city }}
                            </div>
                            <div class="row m-0 pt-2">
                                {{ 'Code: ' . $address->zip_code }}<br />
                                {{ 'Phone: ' . $address->phone }}
                            </div>
                            <div class="row m-0 pt-4">
                                <div class="h5">
                                    Address:
                                </div>
                                <div>
                                    {{ $address->address }}
                                </div>
                            </div>
                        </div>
                        <div class="col-6 row m-0">
                            <div class="col-4">
                                <a href="{{ route('address.edit', $address->id) }}" class="btn btn-primary">
                                    Modify
                                </a>
                            </div>
                            <div class="col-4">
                                <form action="{{ route('address.destroy', $address->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger">
                                        Delete
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
                        No addresses yet, create one now.
                    </div>
                </div>
            </div>
        @endforelse
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-6">
            <a href="{{ route('address.create') }}" class="btn btn-success">
                Add new address
            </a>
        </div>
    </div>
</x-app-layout>
