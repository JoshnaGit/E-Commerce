@extends('layouts.app')
@section('content')

<form action="{{ route('users.update', $user->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label for="name">Name:</label>
    <input type="text" name="name" id="name" value="{{ $user->name }}" required>
    <br><br>
    <label for="email">Email:</label>
    <input type="email" name="email" id="email" value="{{ $user->email }}" required>
    <br><br>
    <label for="password">Password:</label>
    <input type="password" name="password" id="password">
    <br><br>
    <label for="role_id">Role:</label>
    <select name="role_id" id="role_id" required>
        @foreach ($roles as $role)
            <option value="{{ $role->id }}" @if ($user->role_id == $role->id) selected @endif>{{ $role->name }}</option>
        @endforeach
    </select>
    <br><br>
    <button type="submit">Update User</button>
</form>
@endsection