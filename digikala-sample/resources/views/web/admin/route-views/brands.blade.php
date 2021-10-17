@extends('web.admin.main')

@section('view')
    <div>
        <div class="row m-0 my-5">
            @forelse($brands as $brand)
                <div class="col-4 m-auto shadow">
                    <div class="card">
                        <img src="{{ $brand->image->path }}" class="card-img-top" alt="{{ $brand->image->alt }}">
                        <div class="card-body">
                            <h5 class="card-title">
                                <a href="{{ route('brand.show', $brand->id) }}">
                                    {{ $brand->name }}
                                </a>
                            </h5>
                            <p class="card-text">
                                {{ $brand->description }}
                            </p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                Items: {{ $brand->items->count() }}
                            </li>
                            <li class="list-group-item">
                                Accepted by Digi Company
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
            <a href="{{ route('brand.create') }}" class="btn btn-success m-auto my-4">
                Create
            </a>
        </div>
        <div class="mt-5">
            {{ $brands->links() }}
        </div>
    </div>
@stop
