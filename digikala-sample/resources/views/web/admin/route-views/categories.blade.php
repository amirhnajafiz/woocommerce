@extends('web.admin.main')

@section('view')
    <div>
        <ul>
            @forelse($categories as $category)
                <li>
                    {{ $category->name }}
                </li>
            @empty
                <span class="bg-danger text-white">
                Empty
            </span>
            @endforelse
        </ul>
        {{ $categories->links() }}
    </div>
@stop
