@extends('layouts.admin')

@section('title', __('-orders-panel'))

@section('content')
    <div>
        <pre>
            {{ $orders }}
        </pre>
    </div>
@stop
