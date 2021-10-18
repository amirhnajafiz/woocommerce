@extends('layouts.admin')

@section('title', __('-sales-panel'))

@section('content')
    <div>
        <pre>
            {{ $sales }}
        </pre>
    </div>
@stop
