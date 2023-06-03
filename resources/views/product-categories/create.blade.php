
@extends('layouts.app')

@section('content')
    <h1>Create Product Category</h1>

    <form action="{{ route('product-categories.store') }}" method="POST">
        @csrf
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required>
        <button type="submit">Create Category</button>
    </form>
@endsection
