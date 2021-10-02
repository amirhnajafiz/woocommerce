@extends('web.admin.main')

@section('view')
    <div>
        <ul>
            @forelse($items as $item)
                <li>
                    {{ $item->item->name }}
                </li>
            @empty
                <span class="bg-danger text-white">
                Empty
            </span>
            @endforelse
        </ul>
        {{ $items->links() }}
    </div>
@stop
