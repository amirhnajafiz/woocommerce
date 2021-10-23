@section('title', __('-item-'. $item->id))

<x-app-layout>
    <div class="card mx-auto w-75" style="margin-top: 150px;">
        <div class="row m-0">
            <div class="col-md-4 rounded">
                <img src="{{ $item->image->path }}" alt="{{ $item->image->alt }}" class="rounded" />
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h1 class="card-title h1">
                        {{ $item->name }}
                    </h1>
                    <div class="card-text pb-4 mb-4" style="border-bottom: 1px solid #bababa">
                        Categories:
                        <ul>
                                @forelse($item->categories as $category)
                                    <li>
                                        {{ $category->name }}
                                    </li>
                                @empty
                                    <li>
                                        This item has no categories!
                                    </li>
                                @endforelse
                        </ul>
                    </div>
                    <div class="d-flex flex-col">
                        <span>
                            {{ "Price: " . $item->price }}
                        </span>
                        <span>
                            {{ "Number: " . $item->number }}
                        </span>
                    </div>
                    <p class="card-text">
                        <a href="{{ route('brand.show', $item->brand->id) }}">
                            <small class="text-muted">Brand {{ $item->brand->name }}</small>
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
