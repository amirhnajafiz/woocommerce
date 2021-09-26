@extends('layouts.admin.app')

@section('content')
    <div class="row">
        <div class="col-2">
            <x-admin.navigation></x-admin.navigation>
        </div>
        <div class="col-10">
            @yield('view')
        </div>
    </div>
@stop
