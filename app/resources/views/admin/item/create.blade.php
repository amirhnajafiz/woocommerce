@extends('layouts.admin')

@section('title', __('-create-item'))

@section('style')
    <style>
        .form-input {
            width: 90%;
            padding: 10px;
            border: 0 solid black;
            border-bottom: 1px solid #c8c8c8;
            color: #c8c8c8;
            background-color: initial;
            outline: none !important;
            margin: 20px 0;
        }

        input:focus {
            outline: none;
        }

        .form-input:focus {
            background-color: rgba(119, 119, 119, 0.2);
            outline: none;
        }
    </style>
@stop

@section('content')
    <div class="p-5 bg-dark text-white shadow">
        <h1 class="h2 d-flex justify-start" style="align-items:center; position: relative;">
            <strong class="ml-3">Create a new item</strong>
        </h1>
    </div>
    <form action="{{ route('item.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row m-0 gap-y-10">
            <div class="text-white px-5 my-4 col-6">
                <h2>
                    Basic information
                </h2>
                <div>
                    <label for="name">Item name:</label><br/>
                    <input id="name" class="form-input" type="text" name="name" placeholder="Name ..."/>
                </div>
                <div>
                    <label for="price">Item price:</label><br/>
                    <input id="price" class="form-input" type="number" name="price" placeholder="Price ..."/>
                </div>
            </div>
            <div class="text-white px-5 my-4 col-6">
                <label for="brand">
                    Item Brand
                </label><br/>
                <select id="brand" name="brand_id" class="form-input">
                    <option class="text-light" value="" selected>
                        {{ __('-- none --') }}
                    </option>
                    @foreach($brands as $brand)
                        <option class="text-dark" value="{{ $brand->id }}">
                            {{ $brand->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="text-white px-5 my-4 col-6">
                <label for="parent">
                    Item Category
                </label><br/>
                <select id="parent" name="category_id[]" class="form-input text-white" multiple size="1">
                    <option class="text-light" value="" selected>
                        {{ __('-- none --') }}
                    </option>
                    @foreach($categories as $category)
                        <option class="text-light" value="{{ $category->id }}">
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="text-white px-5 my-4 col-6">
                <h2>
                    Picture
                </h2>
                <input class="form-input" type="file" name="file"/>
            </div>
            <div class="px-5">
                <button type="submit" class="btn btn-light">
                    Create
                </button>
            </div>
        </div>
    </form>
@stop
