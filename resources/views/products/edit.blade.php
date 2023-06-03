@extends('layouts.app')

@section('content')
<form action="{{ route('products.update', $product->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label for="name">Name:</label>
    <input type="text" name="name" id="name" value="{{ $product->name }}" required>
    <label for="description">Description:</label>
    <input type="text" name="description" id="description" value="{{ $product->description }}" required>
    <label for="price">Price:</label>
    <input type="number" name="price" id="price" value="{{ $product->price }}" required>
    <label for="productcategory_id">Category:</label>
    <select name="productcategory_id" id="productcategory_id" required>
        @foreach ($categories as $category)
            <option value="{{ $category->id }}" @if ($category->id === $product->productcategory_id) selected @endif>{{ $category->name }}</option>
        @endforeach
    </select>
    <button type="submit">Update Product</button>
</form>

@endsection