@extends('layouts.admin')

@section('title', __('-payments-panel'))

@section('content')
    <div>
        <pre>
            {{ $payments }}
        </pre>
    </div>
@stop
