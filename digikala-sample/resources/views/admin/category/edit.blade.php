@extends('layouts.admin')

@section('title', __('-edit-category-' . $category->id))

@section('content')
    <div class="p-5 bg-dark text-white shadow">
        <h1 class="h2 d-flex justify-start" style="align-items:center;">
            <strong class="ml-3">{{ $category->name }}</strong>
        </h1>
    </div>
    <div class="p-5 text-white">
        <div class="h3 my-4">
            Name: {{ $category->name }}
        </div>
        <div class="h3 my-4">
            Super-Category
        </div>
        <div>
            {{ $category->parrent ?? 'This is a main category' }}
        </div>
        <div class="h3 my-4">
            Sub-Categories
        </div>
        <div>
            <ul>
                @forelse($category->children as $child)
                    <li>
                        {{ $child->name }}
                    </li>
                @empty
                    <li>
                        No child categories
                    </li>
                @endforelse
            </ul>
        </div>
        <div class="h3 my-4">
            Icon
        </div>
        <div>
            <img style="width: 150px; height: 150px;" src="{{ $category->image->path }}" alt="{{ $category->image->alt }}" />
        </div>
    </div>
@stop



