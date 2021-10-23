@section('title', __('-edit-address-') . $address->id)

@section('style')
    <style>
        .input-form {
            display: block;
            padding: 10px;
            outline: none;
            border: 0 solid black;
            width: 50%;
            border-bottom: 1px solid #a4a4a4;
        }

        .input-form:hover {
            background-color: #c1c1c1;
        }
    </style>
@stop

<x-app-layout>
    <div class="py-12">
        <form action="{{ route('address.update', $address->id) }}" method="post">
            @csrf
            @method('put')
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="h2 p-6">
                        Edit address
                    </div>
                    <div class="p-6 bg-white border-b border-gray-200">
                        <label for="state">
                            State
                        </label>
                        <input
                            class="input-form"
                            type="text"
                            name="state"
                            id="state"
                            placeholder="California ..."
                            value="{{ $address->state }}"
                        />
                    </div>
                    <div class="p-6 bg-white border-b border-gray-200">
                        <label for="city">
                            City
                        </label>
                        <input class="input-form" type="text" name="city" id="city" placeholder="Los Angeles ..."
                               value="{{ $address->city }}"/>
                    </div>
                    <div class="p-6 bg-white border-b border-gray-200">
                        <label for="address">
                            Address
                        </label>
                        <textarea class="input-form" name="address" id="address"
                                  placeholder="13th street, number 22 ...">{{ $address->address }}</textarea>
                    </div>
                    <div class="p-6 bg-white border-b border-gray-200">
                        <label for="zip">
                            Zip code
                        </label>
                        <input class="input-form" type="number" name="zip_code" id="zip" placeholder="12XXX490 ..."
                               value="{{ $address->zip_code }}"/>
                    </div>
                    <div class="p-6 bg-white border-b border-gray-200">
                        <label for="phone">
                            Phone
                        </label>
                        <input class="input-form" type="text" name="phone" id="phone" placeholder="+ 1 (902) XX 120-98"
                               value="{{ $address->phone }}"/>
                    </div>
                    <div class="p-6 bg-white border-b border-gray-200">
                        <input type="reset" class="btn btn-danger" value="Reset"/>
                        <input type="submit" class="btn btn-success" value="Update"/>
                    </div>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>
