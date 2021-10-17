@extends('web.admin.main')

@section('view')
    <div>
        <div class="row m-0 my-3">
            @forelse($items as $item)
                <div class="col-4 m-auto">
                    <div class="card">
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
                            <li class="list-group-item">
                                Price: {{ $item->price }}
                            </li>
                            <li class="list-group-item">
                                Score: {{ $item->score }}
                            </li>
                            <li class="list-group-item">
                                View: {{ $item->view }}
                            </li>
                        </ul>
                        @if($item->isSpecial())
                            Remove from Special <!-- TODO: Make js request -->
                        @else
                            Make Special <!-- TODO: Make js request -->
                        @endif
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
            {{ $items->links() }}
        </div>
        <a href="{{ route('item.create') }}" class="d-block w-25 btn btn-success m-auto my-4 disabled">
            Create
        </a>
    </div>
@stop

