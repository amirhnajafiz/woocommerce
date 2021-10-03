@extends('web.admin.main')

@section('view')
    <div>
        <div class="row m-0 my-3">
            @forelse($categories as $category)
                <div class="col-4 m-auto">
                    <div class="card">
                        <img src="{{ $category->image->path }}" class="card-img-top" alt="{{ $category->image->alt }}">
                        <div class="card-body">
                            <h5 class="card-title">
                                {{ $category->name }}
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
        <div class="mt-5">
            {{ $categories->links() }}
        </div>
        <a href="#" class="d-block w-25 btn btn-success m-auto my-4 disabled">
            Create
        </a>
    </div>
@stop
