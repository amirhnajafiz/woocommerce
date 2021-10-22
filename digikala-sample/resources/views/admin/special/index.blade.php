@extends('layouts.admin')

@section('title', __('-specials-panel'))

@section('content')
    <div>
        <div class="row m-0 my-5 gap-x-10 gap-y-10">
            @forelse($items as $item)
                <div class="col-4 m-auto shadow">
                    <div class="card bg-dark text-light">
                        <div class="card-body">
                            <h5 class="card-title">
                                {{ $item->item->name }}
                            </h5>
                            <p class="card-text">
                                By: {{ $item->item->brand->name }}<br />
                                Left: {{ $item->item->number }}
                            </p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item bg-dark text-light">
                                Price: {{ $item->item->price }}
                            </li>
                            <li class="list-group-item bg-dark text-light">
                                Score: {{ $item->item->score }}
                            </li>
                            <li class="list-group-item bg-dark text-light">
                                View: {{ $item->item->view }}
                            </li>
                        </ul>
                        <div class="text-center">
                            <form action="{{ route('special.destroy', $item->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger">
                                    Remove
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 my-2">
                    <span class="bg-danger text-white">
                        Empty
                    </span>
                </div>
            @endforelse
        </div>
        <div class="mt-5">
            {{ $items->links() }}
        </div>
    </div>
@stop

