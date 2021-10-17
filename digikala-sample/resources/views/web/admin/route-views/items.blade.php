@extends('web.admin.main')

@section('view')
    <div>
        <div class="row m-0 my-3">
            @forelse($items as $item)
                <div class="col-lg-4 col-md-12 col-sm-12 m-auto shadow">
                    <div class="card bg-dark text-white">
                        <img src="{{ $item->image->path }}" class="card-img-top" alt="{{ $item->image->alt }}">
                        <div class="card-body">
                            <h5 class="card-title">
                                <a href="{{ route('item.show', $item->id) }}">
                                    {{ $item->name }}
                                </a>
                            </h5>
                            <div class="card-text">
                                Categories:
                                <ul>
                                    @if($item->category)
                                        @forelse($item->category as $category)
                                            <li>
                                                {{ $category->name }}
                                            </li>
                                        @empty
                                            <li>
                                                This item has no categories!
                                            </li>
                                        @endforelse
                                    @else
                                        <li>
                                            This item has no categories!
                                        </li>
                                    @endif
                                </ul>
                                By: {{ $item->brand->name }}<br />
                                Left: {{ $item->number }}
                            </div>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item bg-dark text-white">
                                Price: {{ $item->price }}
                            </li>
                            <li class="list-group-item bg-dark text-white">
                                Score: {{ $item->score }}
                            </li>
                            <li class="list-group-item bg-dark text-white">
                                View: {{ $item->view }}
                            </li>
                        </ul>
                        <div class="flex flex-wrap justify-evenly p-3">
                            @if($item->isSpecial())
                                <a href="#" class="btn btn-warning">
                                    Remove from Special
                                </a> <!-- TODO: Make js request -->
                            @else
                                <a href="#" class="btn btn-success">
                                    Make Special
                                </a><!-- TODO: Make js request -->
                            @endif
                            <a href="#" class="btn btn-primary">
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
            <a href="{{ route('item.create') }}" class="btn btn-dark m-auto">
                Create a new <strong>item</strong>
            </a>
        </div>
        <div class="mt-5">
            {{ $items->links() }}
        </div>
    </div>
@stop

