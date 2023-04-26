@extends('layouts.admin')

@section('title', __('-carts-panel'))

@section('content')
    <div>
        <div class="row m-0 my-3 gap-x-10 gap-y-10">
            @forelse($carts as $cart)
                <div class="col-lg-4 col-md-12 col-sm-12 m-auto shadow">
                    <div class="card bg-dark text-white">
                        <div class="card-body">
                            <h5 class="h4 card-title">
                                {{ $cart->user->name }}
                            </h5>
                            <div class="card-text">
                                Create: {{ $cart->created_at }}<br />
                                Last change: {{ $cart->updated_at }}<br />
                                Items: {{ $cart->orders->count() }}<br />
                            </div>
                        </div>
                        <div class="flex flex-wrap justify-evenly p-3">
                            <form action="{{ route('admin-cart.update', $cart->id) }}" method="post" class="my-2">
                                @csrf
                                @method('put')
                                <label for="{{ 'status' . $cart->id }}">
                                    Status:
                                </label>
                                <select class="bg-dark text-white" id="{{ 'status' . $cart->id }}" name="status">
                                    <option
                                        value="{{ \App\Enums\Status::ORDER() }}"
                                        @if($cart->status == \App\Enums\Status::ORDER())
                                            selected
                                        @endif
                                    >
                                        Order
                                    </option>
                                    <option
                                        value="{{ \App\Enums\Status::FAILED() }}"
                                        @if($cart->status == \App\Enums\Status::FAILED())
                                            selected
                                        @endif
                                    >
                                        Failed
                                    </option>
                                    <option
                                        value="{{ \App\Enums\Status::STORE_FAIL() }}"
                                        @if($cart->status == \App\Enums\Status::STORE_FAIL())
                                            selected
                                        @endif
                                    >
                                        Failed cause of store
                                    </option>
                                    <option
                                        value="{{ \App\Enums\Status::READY() }}"
                                        @if($cart->status == \App\Enums\Status::READY())
                                            selected
                                        @endif
                                    >
                                        Ready
                                    </option>
                                    <option
                                        value="{{ \App\Enums\Status::SEND() }}"
                                        @if($cart->status == \App\Enums\Status::SEND())
                                            selected
                                        @endif
                                    >
                                        Sent
                                    </option>
                                    <option
                                        value="{{ \App\Enums\Status::DELIVERED() }}"
                                        @if($cart->status == \App\Enums\Status::DELIVERED())
                                            selected
                                        @endif
                                    >
                                        Delivered
                                    </option>
                                </select>
                                <button type="submit" class="btn btn-light">
                                    Update
                                </button>
                            </form>
                            <form action="{{ route('admin-cart.destroy', $cart->id) }}" method="post" class="my-2">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger">
                                    Delete
                                </button>
                                <a href="{{ route('cart.show', $cart->id) }}" class="btn btn-primary my-2">
                                    View Cart
                                </a>
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
        <div class="mt-5">
            {{ $carts->links() }}
        </div>
    </div>
@stop
