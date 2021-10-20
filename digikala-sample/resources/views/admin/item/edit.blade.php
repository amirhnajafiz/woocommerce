@extends('layouts.admin')

@section('title', __('-edit-item-') . $item->id)

@section('style')
    <style>
        .form-input {
            width: 50%;
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
            <strong class="ml-3">{{ 'Editing item: ' . $item->name }}</strong>
            <small style="position: absolute; bottom: 0; right: 2px;">by {{ $item->brand->name }}</small>
        </h1>
    </div>
    <form action="{{ route('item.update', $item->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="p-5 text-white">
            <div>
                <div>
                    <label for="name">Item name:</label><br />
                    <input
                        id="name"
                        class="form-input"
                        value="{{ $item->name }}"
                        type="text"
                        name="name"
                        placeholder="Name ..."
                    />
                </div>
                <div>
                    <label for="price">Item price:</label><br />
                    <input
                        id="price"
                        class="form-input"
                        value="{{ $item->price }}"
                        type="number"
                        name="price"
                        placeholder="Price ..."
                    />
                </div>
                <div>
                    <label for="number">Items in store:</label><br />
                    <input
                        id="number"
                        class="form-input"
                        value="{{ $item->number }}"
                        type="number"
                        name="number"
                        placeholder="Number ..."
                    />
                </div>
            </div>
            <div>
                <label for="brand">
                    Item Brand:
                </label><br />
                <select id="brand" name="brand_id" class="form-input">
                    @foreach($brands as $brand)
                        <option
                            class="text-dark"
                            value="{{ $brand->id }}"
                            @if($brand->id == $item->brand->id)
                            @endif
                        >
                            {{ $brand->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="category">
                    Item Category:
                </label><br />
                <select id="category" name="category_id[]" class="form-input" multiple>
                    <option
                        class="text-light"
                        value=""
                        @if($item->categories()->count() == 0)
                            {{ 'selected' }}
                        @endif
                    >
                        {{ __('-- none --') }}
                    </option>
                    @foreach($categories as $category)
                        <option
                            class="text-dark"
                            value="{{ $category->id }}"
                            @if($item->categories()->get()->only('id')->has($category->id))
                                {{ 'selected' }}
                            @endif
                        >
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div>
                <img width="150" src="{{ asset($item->image->path) }}" alt="{{ $item->image->alt }}" /><br />
                <input class="form-input" type="file" name="file" />
            </div>
            <div>
                <button type="submit" class="btn btn-light">
                    Update
                </button>
            </div>
        </div>
    </form>
@stop
