@extends('layouts.admin')

@section('title', __('-create-brand'))

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
            <strong class="ml-3">Create a new brand / company</strong>
        </h1>
    </div>
    <form action="{{ route('brand.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="text-white px-5 my-4">
            <div>
                <label for="name">Brand name:</label><br />
                <input id="name" class="form-input" type="text" name="name" placeholder="Name ..."/>
            </div>
        </div>
        <div class="text-white px-5 my-4">
            <label for="description">
                Description
            </label><br />
            <textarea id="description" class="form-input" name="description" placeholder="Say about your company ..."></textarea>
        </div>
        <div class="text-white px-5 my-4">
            <h2>
                Logo
            </h2>
            <input class="form-input" type="file" name="file" />
        </div>
        <div class="px-5">
            <button type="submit" class="btn btn-light">
                Create
            </button>
        </div>
    </form>
@stop


