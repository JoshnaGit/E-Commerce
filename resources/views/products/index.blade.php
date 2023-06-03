@extends('layouts.app')

@section('content')


@foreach ($products as $product)
    <h3>{{ $product->name }}</h3>
    <p>Description: {{ $product->description }}</p>
    <p>Price: {{ $product->price }}</p>
    <p>Category: {{ $product->category->name }}</p>
    <a href="{{ route('products.edit', $product->id) }}">Edit</a>
    <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display: inline">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
    <hr>
@endforeach

<a href="{{ route('products.create') }}">Create Product</a>
@endsection