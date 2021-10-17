@extends('web.admin.main')

@section('view')
    <div>
        <div class="row m-0 my-5">
            @forelse($categories as $category)
                <div class="col-4 m-auto shadow">
                    <div class="card bg-dark text-white">
                        <img src="{{ $category->image->path }}" class="card-img-top" alt="{{ $category->image->alt }}">
                        <div class="card-body">
                            <h5 class="h2 card-title">
                                <a href="{{ route('category.show', $category->id) }}">
                                    {{ $category->name }}
                                </a>
                            </h5>
                        </div>
                        <div class="card-text p-3">
                            Items: {{ $category->items->count() }}
                        </div>
                        <div class="flex flex-wrap justify-evenly p-3">
                            <a href="{{ route('category.edit', $category->id) }}" class="btn btn-primary">
                                Edit
                            </a>
                            <a href="#" class="btn btn-danger">
                                Delete
                            </a>
                        </div>
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
            <a href="{{ route('category.create') }}" class="btn btn-dark m-auto">
                Create a new <strong>category</strong>
            </a>
        </div>
        <div class="mt-5">
            {{ $categories->links() }}
        </div>
    </div>
@stop
