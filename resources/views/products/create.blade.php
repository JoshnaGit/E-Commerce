@extends('layouts.app')

@section('content')
<form action="{{ route('products.store') }}" method="POST">
    @csrf
    <label for="name">Name:</label>
    <input type="text" name="name" id="name" required>
    <label for="description">Description:</label>
    <input type="text" name="description" id="description" required>
    <label for="price">Price:</label>
    <input type="number" name="price" id="price" required>
    <label for="productcategory_id">Category:</label>
    <select name="productcategory_id" id="productcategory_id" required>
        @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
    </select>
    <button type="submit">Create Product</button>
</form>

@endsection