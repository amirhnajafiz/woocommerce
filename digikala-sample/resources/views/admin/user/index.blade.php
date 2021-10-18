@extends('layouts.admin')

@section('title', __('-users-panel'))

@section('content')
    <div>
        <pre>
            {{ $users }}
        </pre>
    </div>
@stop
