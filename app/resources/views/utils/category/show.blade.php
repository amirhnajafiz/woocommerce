@section('title', __('-category-'. $category->id))

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
        <div class="h2 mb-5 py-4 border-gray-200 border-b">
            Category {{ $category->name }}
        </div>
        <div class="row m-0">
            @forelse($category->items as $item)
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
