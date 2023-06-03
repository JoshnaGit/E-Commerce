
@extends('layouts.app')

@section('content')
    <h1>Product Categories</h1>

    @foreach ($categories as $category)
        <p>{{ $category->name }}</p>
        <a href="{{ route('product-categories.edit', $category->id) }}">Edit</a>
        <form action="{{ route('product-categories.destroy', $category->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
    @endforeach

    <a href="{{ route('product-categories.create') }}">Create New Category</a>
@endsection
