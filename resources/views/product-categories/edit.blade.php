
@extends('layouts.app')

@section('content')
    <h1>Edit Product Category</h1>

    <form action="{{ route('product-categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="{{ $category->name }}" required>
        <button type="submit">Update Category</button>
    </form>
@endsection
