@extends('layouts.admin')

@section('title', __('categories-panel'))

@section('content')
    <div>
        <div class="h3 text-white px-6 py-2">
            Categories
        </div>
        <div class="row m-0 my-5 gap-x-10 gap-y-10">
            @forelse($categories as $category)
                <div class="col-4 m-auto shadow">
                    <div class="card bg-dark text-white">
                        <div class="card-body">
                            <h5 class="h4 card-title text-center">
                                <a href="{{ route('category.show', $category->id) }}">
                                    {{ $category->name }}
                                </a>
                            </h5>
                        </div>
                        <div class="flex flex-wrap justify-evenly p-3">
                            <a href="{{ route('category.edit', $category->id) }}" class="btn btn-primary">
                                Edit
                            </a>
                            <form action="{{ route('category.destroy', $category->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger">
                                    Delete
                                </button>
                            </form>
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
                Create a new <strong>category</strong> +
            </a>
        </div>
        <div class="mt-5">
            {{ $categories->links() }}
        </div>
    </div>
@stop
