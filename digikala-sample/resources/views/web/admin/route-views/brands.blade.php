@extends('web.admin.main')

@section('view')
    <div>
        @forelse($brands as $brand)
            {{ $brand->name }}
        @empty
            <span class="bg-danger text-white">
                Empty
            </span>
        @endforelse
        {{ $brands->links() }}
    </div>
@stop
