@extends('web.admin.main')

@section('view')
    <div>
        <ul>
            @forelse($brands as $brand)
                <li>
                    {{ $brand->name }}
                </li>
            @empty
                <span class="bg-danger text-white">
                    Empty
                </span>
            @endforelse
        </ul>
        {{ $brands->links() }}
    </div>
@stop
