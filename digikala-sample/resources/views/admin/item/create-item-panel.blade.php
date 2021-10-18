@extends('admin.main')

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

@section('view')
    <div class="p-5 bg-dark text-white shadow">
        <h1 class="h2 d-flex justify-start" style="align-items:center; position: relative;">
            <strong class="ml-3">Create a new item</strong>
        </h1>
    </div>
    <form action="#" method="post">
        <div class="text-white px-5 my-4">
            <h2>
                Basic information
            </h2>
            <div>
                <input class="form-input" type="text" name="name" placeholder="Name ..."/>
            </div>
            <div>
                <input class="form-input" type="number" name="price" placeholder="Price ..."/>
            </div>
            <div>
                <input class="form-input" type="text" name="brand" placeholder="Brand ..."/>
            </div>
        </div>
        <div class="text-white px-5 my-4">
            <h2>
                Category
            </h2>
            <select class="form-input">
                <option>
                    1
                </option>
                <option>
                    1
                </option>
                <option>
                    1
                </option>
            </select>
        </div>
        <div class="text-white px-5 my-4">
            <h2>
                Picture
            </h2>
            <input class="form-input" type="file" name="file" />
        </div>
        <div class="px-5">
            <a href="#" class="btn btn-light">
                Create
            </a>
        </div>
    </form>
@stop
