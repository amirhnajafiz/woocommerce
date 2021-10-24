@extends('layouts.admin')

@section('title', __('-payments-panel'))

@section('content')
    <div>
        <div class="row m-0 my-3 gap-x-10 gap-y-10">
            @forelse($payments as $payment)
                <div class="col-lg-4 col-md-12 col-sm-12 m-auto shadow">
                    <div class="card bg-dark text-white">
                        <div class="card-body">
                            <h5 class="h4 card-title">
                                {{ $payment->cart->user->name }}
                            </h5>
                            <div class="card-text">
                                Time: {{ $payment->created_at }}<br />
                                Amount: {{ $payment->amoun }}<br />
                                Bank: {{ $payment->bank }}
                            </div>
                        </div>
                        <div class="flex flex-wrap justify-evenly p-3">
                            <a href="{{ route('payment.show', $payment->id) }}" class="btn btn-primary">
                                View
                            </a>
                            <form action="{{ route('admin-payment.destroy', $payment) }}" method="post">
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
            {{ $payments->links() }}
        </div>
    </div>
@stop
