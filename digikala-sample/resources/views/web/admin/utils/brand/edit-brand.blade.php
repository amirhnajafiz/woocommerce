@extends('web.admin.main')

@section('view')
    <div class="p-5 bg-dark text-white shadow">
        <h1 class="h2">
            Edit <strong>{{ $brand->name }}</strong>
        </h1>
    </div>
    <div class="p-5 text-white">
        <div class="border-bottom pb-2 mb-5">
            <div class="h3 mb-2">
                Name
            </div>
            <div>
                {{ $brand->name }}
            </div>
        </div>
        <div class="border-bottom pb-2 mb-5">
            <div class="h3 mb-2">
                Description
            </div>
            <div>
                {{ $brand->description }}
            </div>
        </div>
        <div class="mb-5">
            <div class="h3 mb-2">
                Brand Logo
            </div>
            <div>
                <img class="rounded-circle" style="width: 150px; height: 150px;" src="{{ $brand->image->path }}"
                     alt="{{ $brand->image->alt }}"/>
            </div>
        </div>
    </div>
@stop

