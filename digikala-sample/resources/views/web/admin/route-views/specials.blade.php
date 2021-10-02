@extends('web.admin.main')

@section('view')
    <div>
        @forelse($items as $item)
            {{ $item->item->name }}
        @empty
            <span class="bg-danger text-white">
                Empty
            </span>
        @endforelse
        {{ $items->links() }}
    </div>
@stop
