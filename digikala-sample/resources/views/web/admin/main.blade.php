@extends('layouts.admin')

@section('content')
    <div class="row m-0 p-0">
        <div class="col-2 p-0">
            <x-admin.navigation></x-admin.navigation>
        </div>
        <div class="col-10 p-0">
            @yield('view')
        </div>
    </div>
@stop
