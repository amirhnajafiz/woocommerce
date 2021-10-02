@extends('web.admin.main')

@section('view')
    <div>
        @forelse($categories as $category)
            {{ $category->name }}
        @empty
            <span class="bg-danger text-white">
                Empty
            </span>
        @endforelse
        {{ $categories->links() }}
    </div>
@stop
