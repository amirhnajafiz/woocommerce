@section('title', __('-home'))

@section('style')
    <style>
        .card {
            position: relative;
            top: 0;
            transition: top 0.5s;
        }

        .card:hover {
            top: -20px;
        }
    </style>
@stop

<x-app-layout>
    <div class="row m-0 w-75 m-auto my-3">
        <div class="col-12 my-5">
            <a href="{{ route('special-items') }}">
                <span class="h4 p-3 rounded" style="color: #000000; background-color: rgba(255,77,28,0.7)">
                    Special items
                </span>
            </a>
        </div>
        @foreach($specials as $special)
            <div class="col-lg-2 col-md-6 col-sm-12 card mx-auto p-1 shadow" style="background-color: #ff7c50; color: #ffffff">
                <img class="card-img-top" src="{{ $special->item->image->path }}" alt="{{ $special->item->image->alt }}" />
                <div class="card-body">
                    <h5 class="card-title">
                        <a href="{{ route('item.show', $special->item->id) }}">
                            {{ $special->item->name }}
                        </a>
                    </h5>
                    <p class="card-text">
                        {{ $special->item->brand->name }}
                    </p>
                </div>
                <div class="card-footer d-flex justify-between">
                    <small>
                        Price: {{ $special->item->price }}$
                    </small>
                    <small style="color: #000000;">
                        <form action="{{ route('order.store') }}" method="post">
                            @csrf
                            <input type="hidden" name="item_id" value="{{ $special->item->id }}" />
                            <button type="submit" class="rounded bg-light p-1">
                                Add +
                            </button>
                        </form>
                    </small>
                </div>
            </div>
        @endforeach
    </div>
    <div class="row m-0 w-75 m-auto mt-5">
        <div class="row m-0 p-3 rounded my-5" style="background-color: rgba(255,255,255,0.7)">
            <div class="col-6">
                <span class="h4 rounded" style="color: #000000;">
                    Items
                </span>
            </div>
            <div class="col-6 d-flex justify-evenly align-bottom">
                <span class="font-semibold text-gray-800 leading-tight">
                    <a href="{{ route('home') . '?filter=id' }}">
                        Normal
                    </a>
                </span>
                <span class="font-semibold text-gray-800 leading-tight">
                    <a href="{{ route('home') . '?filter=price&mode=desc' }}">
                        High Price
                    </a>
                </span>
                <span class="font-semibold text-gray-800 leading-tight">
                    <a href="{{ route('home') . '?filter=price&mode=desc' }}">
                        High Score
                    </a>
                </span>
                <span class="font-semibold text-gray-800 leading-tight">
                    <a href="{{ route('home') . '?filter=price' }}">
                        Low Price
                    </a>
                </span>
            </div>
        </div>
        <div class="row m-0 gap-x-10 gap-y-10">
            @foreach($items as $item)
                <div class="col-lg-2 col-md-6 col-sm-12 mx-auto card p-1 shadow">
                    <img class="card-img-top" src="{{ $item->image->path }}" alt="{{ $item->image->alt }}" />
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="{{ route('item.show', $item->id) }}">
                                {{ $item->name }}
                            </a>
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
                            <form action="{{ route('order.store') }}" method="post">
                                @csrf
                                <input type="hidden" name="item_id" value="{{ $item->id }}" />
                                <button type="submit" class="rounded bg-light p-1">
                                    Add +
                                </button>
                            </form>
                        </small>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div style="margin-top: 100px;">
        {{ $items->links() }}
    </div>
</x-app-layout>
