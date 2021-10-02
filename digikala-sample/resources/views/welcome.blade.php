<x-app-layout>
    @section('title', $title)
    @foreach($items['items'] as $item)
        <div class="card">
            <img class="card-img-top" src="{{ $item['image']['path'] }}" alt="{{ $item['image']['alt'] }}" />
            <div class="card-body">
                <h5 class="card-title">
                    {{ $item['item']['name'] }}
                </h5>
                <p class="card-text">
                    {{ $item['brand']['name'] }}
                </p>
            </div>
            <div class="card-footer">
                <small class="text-muted">
                    Price: {{ $item['item']['price'] }}$
                </small>
            </div>
        </div>
    @endforeach
</x-app-layout>
