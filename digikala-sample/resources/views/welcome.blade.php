<x-app-layout>
    @section('title', $title)
    <div class="row m-0 w-75 m-auto my-3">
        <h1 class="p-3" style="color: #fd5a24;">
            Special items
        </h1>
        @foreach($specials as $special)
            <div class="col-lg-2 col-md-6 col-sm-12 card mx-auto p-1 shadow">
                <img class="card-img-top" src="{{ $special->item->image->path }}" alt="{{ $special->item->image->alt }}" />
                <div class="card-body">
                    <h5 class="card-title">
                        {{ $special->item->name }}
                    </h5>
                    <p class="card-text">
                        {{ $special->item->brand->name }}
                    </p>
                </div>
                <div class="card-footer d-flex justify-between">
                    <small class="text-muted">
                        Price: {{ $special->item->price }}$
                    </small>
                    <small style="color: #fd5a24;">
                        <a href="#">
                            Add +
                        </a>
                    </small>
                </div>
            </div>
        @endforeach
    </div>
    <div class="row m-0 w-75 m-auto">
        <h1 class="p-3" style="color: #fd5a24;">
            Items
        </h1>
        <div class="bg-white d-flex justify-evenly p-3 rounded mb-4">
            <h2 class="font-semibold text-gray-800 leading-tight" style="color: #fd5a24">
                <a href="{{ route('home') . '?filter=id' }}">
                    Normal
                </a>
            </h2>
            <h2 class="font-semibold text-gray-800 leading-tight" style="color: #fd5a24">
                <a href="{{ route('home') . '?filter=price&mode=desc' }}">
                    High Price
                </a>
            </h2>
            <h2 class="font-semibold text-gray-800 leading-tight" style="color: #fd5a24">
                <a href="{{ route('home') . '?filter=price&mode=desc' }}">
                    High Score
                </a>
            </h2>
            <h2 class="font-semibold text-gray-800 leading-tight" style="color: #fd5a24">
                <a href="{{ route('home') . '?filter=price' }}">
                    Low Price
                </a>
            </h2>
        </div>
        @foreach($items as $item)
            <div class="col-lg-2 col-md-6 col-sm-12 card mx-auto p-2 shadow">
                <img class="card-img-top" src="{{ $item->image->path }}" alt="{{ $item->image->alt }}" />
                <div class="card-body">
                    <h5 class="card-title">
                        {{ $item->name }}
                    </h5>
                    <p class="card-text">
                        {{ $item->brand->name }}
                    </p>
                </div>
                <div class="card-footer d-flex justify-between">
                    <small class="text-muted">
                        Price: {{ $item->price }}$
                    </small>
                    <small style="color: #fd5a24;">
                        <a href="#">
                            Add +
                        </a>
                    </small>
                </div>
            </div>
        @endforeach
    </div>
    <div class="mt-5">
        {{ $items->links() }}
    </div>
</x-app-layout>
