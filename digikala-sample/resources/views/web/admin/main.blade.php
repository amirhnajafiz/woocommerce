@extends('web.layouts.admin.app')

@section('content')
    <div class="row w-75 mt-5 pt-5 mx-auto" style="height: 516px !important;">
        <div class="col-3">
            <x-admin.navigation></x-admin.navigation>
        </div>
        <div class="col-9 bg-white rounded border" style="height: 516px !important; overflow-y: scroll;">
            @yield('view')
        </div>
    </div>
@stop
