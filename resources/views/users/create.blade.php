
@extends('layouts.app')
@section('content')
<!-- <head>
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
</home> -->
<h1>Creates user user and assign role</h1>
<form action="{{ route('users.store') }}" method="POST">
    @csrf
    <label for="name">Name:</label>
    <input type="text" name="name" id="name" required>
    <br><br>
    <label for="email">Email:</label>
    <input type="email" name="email" id="email" required>
    <br><br>
    <label for="password">Password:</label>
    <input type="password" name="password" id="password" required>
    <br><br>
    <label for="role_id">Role:</label>
    <select name="role_id" id="role_id" required>
        @foreach ($roles as $role)
            <option value="{{ $role->id }}">{{ $role->name }}</option>
        @endforeach
    </select>
    <br><br>
    <button type="submit">Create User</button>
</form>
@endsection
