@extends('admin.main')

@section('view')
    <div class="p-5 bg-dark text-white shadow">
        <h1 class="h2 d-flex justify-start" style="align-items:center; position: relative;">
            <img class="rounded-circle" style="width: 150px; height: 150px;" src="{{ $item->image->path }}" alt="{{ $item->image->alt }}" />
            <strong class="ml-3">{{ $item->name }}</strong>
            <small style="position: absolute; bottom: 0; right: 2px;">by {{ $item->brand->name }}</small>
        </h1>
    </div>
    <div class="p-5 text-white">
        <div class="h3 my-4">
            Information
        </div>
        <div>
            <ul>
                <li>
                    Price: {{ $item->price . ' $' }}
                </li>
                <li>
                    Views: {{ $item->view }}
                </li>
                <li>
                    Score: {{ $item->score }}
                </li>
                <li>
                    Left: {{ $item->number }}
                </li>
            </ul>
        </div>
        <div class="h3 my-4">
            Categories
        </div>
        <div>
            <ul>
                @if($item->category)
                    @forelse($item->category as $category)
                        <li>
                            {{ $category->name }}
                        </li>
                    @empty
                        <li>
                            This item has no categories!
                        </li>
                    @endforelse
                @else
                    <li>
                        This item has no categories!
                    </li>
                @endif
            </ul>
        </div>
    </div>
@stop
