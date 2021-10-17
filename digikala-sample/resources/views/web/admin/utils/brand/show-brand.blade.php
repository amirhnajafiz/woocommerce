@extends('web.admin.main')

@section('view')
    <div class="p-5 bg-dark text-white shadow">
        <h1 class="h2 d-flex justify-start" style="align-items:center;">
            <img class="rounded-circle" style="width: 150px; height: 150px;" src="{{ $brand->image->path }}" alt="{{ $brand->image->alt }}" />
            <strong class="ml-3">{{ $brand->name }}</strong>
        </h1>
    </div>
    <div class="p-5 text-white">
        <div class="h3">
            About
        </div>
        <div>
            {{ $brand->description }}
        </div>
    </div>
@stop
