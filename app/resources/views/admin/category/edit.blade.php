@extends('layouts.admin')

@section('title', __('-edit-category-') . $category->id)

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
        <h1 class="h2 d-flex justify-start" style="align-items:center;">
            <strong class="ml-3">{{ 'Editing category: ' . $category->name }}</strong>
        </h1>
    </div>
    <form action="{{ route('category.update', $category->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="text-white px-5 my-4">
            <div>
                <label for="name">Category name:</label><br />
                <input
                    id="name"
                    class="form-input"
                    value="{{ $category->name }}"
                    type="text"
                    name="name"
                    placeholder="Name ..."
                />
            </div>
        </div>
        <div class="text-white px-5 my-4">
            <label for="parent">
                Parent Category:
            </label><br />
            <select id="parent" name="parent_id" class="form-input">
                <option
                    class="text-light"
                    value=""
                    @if($category->parent == null)
                        {{ 'selected' }}
                    @endif
                >
                    {{ __('-- none --') }}
                </option>
                @foreach($categories as $parent)
                    <option
                        class="text-dark"
                        value="{{ $parent->id }}"
                        @if($category->parent && $category->parent->id == $parent->id)
                            {{ 'selected' }}
                        @endif
                    >
                        {{ $parent->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="text-white px-5 my-4">
            <img width="150" src="{{ asset($category->image->path) }}" alt="{{ $category->image->alt }}" /><br />
            <input class="form-input" type="file" name="file" />
        </div>
        <div class="px-5">
            <button type="submit" class="btn btn-light">
                Update
            </button>
        </div>
    </form>
@stop



