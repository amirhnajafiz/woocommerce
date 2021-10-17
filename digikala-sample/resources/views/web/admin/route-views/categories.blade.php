@extends('web.admin.main')

@section('view')
    <div>
        <div class="row m-0 my-5">
            @forelse($categories as $category)
                <div class="col-4 m-auto shadow">
                    <div class="card">
                        <img src="{{ $category->image->path }}" class="card-img-top" alt="{{ $category->image->alt }}">
                        <div class="card-body">
                            <h5 class="card-title">
                                <a href="{{ route('category.show', $category->id) }}">
                                    {{ $category->name }}
                                </a>
                            </h5>
                            <div class="card-text">
                                <span>Children:</span>
                                <ul>
                                    @forelse($category->children as $child)
                                        <li>
                                            {{ $child->name }}
                                        </li>
                                    @empty
                                        <li>
                                            Empty
                                        </li>
                                    @endforelse
                                </ul>
                            </div>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                Items: {{ $category->items->count() }}
                            </li>
                            <li class="list-group-item">
                                Parent: {{ $category->parent ?? $category->parent->name ?? '-' }}
                            </li>
                        </ul>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <span class="bg-danger text-white">
                        Empty
                    </span>
                </div>
            @endforelse
        </div>
        <div class="text-center">
            <a href="{{ route('category.create') }}" class="btn btn-success m-auto my-4">
                Create
            </a>
        </div>
        <div class="mt-5">
            {{ $categories->links() }}
        </div>
    </div>
@stop
