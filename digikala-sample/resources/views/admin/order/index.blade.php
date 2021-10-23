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
                            <a href="{{ route('cart.show', $cart->id) }}" class="btn btn-primary">
                                View Cart
                            </a>
                            <form action="{{ route('admin-cart.update', $cart->id) }}" method="post">
                                @csrf
                                @method('put')
                                <label for="status">
                                    Status:
                                </label>
                                <select id="status" name="status">
                                    <option
                                        value="{{ \App\Enums\Status::ORDER() }}"
                                        {{ $cart->status == \App\Enums\Status::ORDER() ? 'selected' : '' }}
                                    >
                                        Order
                                    </option>
                                    <option
                                        value="{{ \App\Enums\Status::FAILED() }}"
                                        {{ $cart->status == \App\Enums\Status::FAILED() ? 'selected' : '' }}
                                    >
                                        Failed
                                    </option>
                                    <option
                                        value="{{ \App\Enums\Status::STORE_FAIL() }}"
                                        {{ $cart->status == \App\Enums\Status::STORE_FAIL() ? 'selected' : '' }}
                                    >
                                        Failed cause of store
                                    </option>
                                    <option
                                        value="{{ \App\Enums\Status::READY() }}"
                                        {{ $cart->status == \App\Enums\Status::READY() ? 'selected' : '' }}
                                    >
                                        Ready
                                    </option>
                                    <option
                                        value="{{ \App\Enums\Status::SEND() }}"
                                        {{ $cart->status == \App\Enums\Status::SEND() ? 'selected' : '' }}
                                    >
                                        Sent
                                    </option>
                                    <option
                                        value="{{ \App\Enums\Status::DELIVERED() }}"
                                        {{ $cart->status == \App\Enums\Status::DELIVERED() ? 'selected' : '' }}
                                    >
                                        Delivered
                                    </option>
                                </select>
                                <button type="submit" class="btn btn-light">
                                    Update
                                </button>
                            </form>
                            <form action="{{ route('admin-cart.destroy', $cart->id) }}" method="post">
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
        <div class="mt-5">
            {{ $carts->links() }}
        </div>
    </div>
@stop
