@extends('web.layouts.main.app')

@section('content')
    <x-web.nav-bar></x-web.nav-bar>
    <pre>
        {{ $items }}
    </pre>
@stop
