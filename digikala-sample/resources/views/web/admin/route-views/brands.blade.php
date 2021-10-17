@extends('web.admin.main')

@section('view')
    <div>
        <div class="row m-0 my-5">
            @forelse($brands as $brand)
                <div class="col-4 m-auto shadow">
                    <div class="card bg-dark text-white">
                        <img src="{{ $brand->image->path }}" class="card-img-top" alt="{{ $brand->image->alt }}">
                        <div class="card-body">
                            <h5 class="h2 card-title">
                                <a href="{{ route('brand.show', $brand->id) }}">
                                    {{ $brand->name }}
                                </a>
                            </h5>
                            <p class="card-text">
                                {{ $brand->description }}
                            </p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item bg-dark text-white">
                                Items: {{ $brand->items->count() }}
                            </li>
                            <li class="list-group-item bg-dark text-white">
                                Accepted by Digi Company
                            </li>
                        </ul>
                        <div class="flex flex-wrap justify-evenly p-3">
                            <a href="{{ route('brand.edit', $brand->id) }}" class="btn btn-primary">
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
            <a href="{{ route('brand.create') }}" class="btn btn-dark m-auto">
                Create a new <strong>brand</strong>
            </a>
        </div>
        <div class="mt-5">
            {{ $brands->links() }}
        </div>
    </div>
@stop
