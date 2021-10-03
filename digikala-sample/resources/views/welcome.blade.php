<x-app-layout>
    <div class="bg-white d-flex justify-evenly py-2">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{ route('home', 'id') }}">
                Normal
            </a>
        </h2>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{ route('home', ['price', 'desc']) }}">
                High Price
            </a>
        </h2>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{ route('home', ['score', 'desc']) }}">
                High Score
            </a>
        </h2>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{ route('home', 'price') }}">
                Low Price
            </a>
        </h2>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{ route('home', 'score') }}">
                Low Score
            </a>
        </h2>
    </div>

    @section('title', $title)
    <div class="row m-0 w-75 m-auto">
        <h1>
            Special items
        </h1>
        @foreach($special_items as $item)
            <div class="col-2 card mx-auto my-5">
                <img class="card-img-top" src="{{ $item->image->path }}" alt="{{ $item->image->alt }}" />
                <div class="card-body">
                    <h5 class="card-title">
                        {{ $item->name }}
                    </h5>
                    <p class="card-text">
                        {{ $item->brand->name }}
                    </p>
                </div>
                <div class="card-footer">
                    <small class="text-muted">
                        Price: {{ $item->price }}$
                    </small>
                </div>
            </div>
        @endforeach
    </div>
    <div class="my-3">
        {{ $special_items->links() }}
    </div>
    <div class="row m-0 w-75 m-auto">
        <h1>
            Items
        </h1>
        @foreach($items as $item)
            <div class="col-2 card mx-auto my-5">
                <img class="card-img-top" src="{{ $item->image->path }}" alt="{{ $item->image->alt }}" />
                <div class="card-body">
                    <h5 class="card-title">
                        {{ $item->name }}
                    </h5>
                    <p class="card-text">
                        {{ $item->brand->name }}
                    </p>
                </div>
                <div class="card-footer">
                    <small class="text-muted">
                        Price: {{ $item->price }}$
                    </small>
                </div>
            </div>
        @endforeach
    </div>
    <div class="my-3">
        {{ $items->links() }}
    </div>
</x-app-layout>
