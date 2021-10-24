@extends('layouts.admin')

@section('title', __('-sales-panel'))

@section('content')
    <div class="row m-0 my-3">
        <div class="col-8">
            @forelse($sales as $sale)
                <div class="shadow">
                    <div class="card bg-dark text-white">
                        <div class="h4 card-title">
                            {{ $sale->code }}
                        </div>
                        <div class="card-text">
                            <form action="{{ route('sale.update', $sale->id) }}" method="post">
                                @csrf
                                @method('put')
                                <label for="number">
                                    Discount:
                                </label>
                                <input
                                    id="number"
                                    class="text-white bg-dark"
                                    type="number"
                                    name="discount"
                                    value="{{ $sale->discount }}"
                                    min="1"
                                    max="99"
                                />
                                <button type="submit" class="btn btn-light">
                                    Change
                                </button>
                            </form>
                        </div>
                        <div class="flex flex-wrap justify-evenly p-3">
                            <form action="{{ route('sale.destroy', $sale->id) }}" method="post">
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
                <div>
                    No sales yet.
                </div>
            @endforelse
            <div class="mt-5">
                {{ $sales->links() }}
            </div>
        </div>
        <div class="col-4">
            <form action="{{ route('sale.store') }}" method="post">
                @csrf
                <label for="discount">
                    Discount:
                </label>
                <input
                    id="discount"
                    class="text-white bg-dark"
                    type="number"
                    name="discount"
                    placeholder="50 %..."
                    min="1"
                    max="99"
                />
                <button type="submit" class="btn btn-success">
                    Create
                </button>
            </form>
        </div>
    </div>
@stop
