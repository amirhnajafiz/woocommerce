@extends('layouts.admin')

@section('title', __('-edit-brand-') . $brand->id)

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
            <strong class="ml-3">{{ 'Editing brand: ' . $brand->name }}</strong>
        </h1>
    </div>
    <form action="{{ route('brand.update', $brand->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="p-5 text-white">
            <div>
                <label for="name">Brand name:</label><br />
                <input
                    id="name"
                    class="form-input"
                    value="{{ $brand->name }}"
                    type="text"
                    name="name"
                    placeholder="Name ..."
                />
            </div>
            <div>
                <label for="description">
                    Description:
                </label><br />
                <textarea id="description" class="form-input" name="description" placeholder="Say about your company ...">{{ $brand->description }}</textarea>
            </div>
            <div>
                <img width="150" src="{{ asset($brand->image->path) }}" alt="{{ $brand->image->alt }}" /><br />
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

