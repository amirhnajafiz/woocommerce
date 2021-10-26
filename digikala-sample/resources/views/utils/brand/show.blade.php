@section('title', __('-brand-'. $brand->id))

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
    <div class="mx-auto w-75" style="margin-top: 150px;">
        <div class="flex justify-between m-0 mb-5 py-4 border-gray-200 border-b">
            <div class="flex flex-col">
                <div class="h2">
                    Brand {{ $brand->name }}
                </div>
                <small>
                    {{ $brand->description }}
                </small>
            </div>
            <div>
                <img src="{{ asset($brand->image->path) }}" alt="{{ $brand->image->alt }}" width="100px" />
            </div>
        </div>
        <div class="row m-0">
            @forelse($brand->items as $item)
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
            @empty
                <div class="col-12 mx-auto p-1 shadow">
                    No items for this category.
                </div>
            @endforelse
        </div>
    </div>
</x-app-layout>

