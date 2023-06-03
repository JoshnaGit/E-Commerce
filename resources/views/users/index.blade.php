<!-- users.index.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>User Management</h1>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }} (- current role: {{ $user->role->name }})</td>
                    <td>
                        <!-- Edit User -->
                        <a href="{{ route('users.edit', $user->id) }}">Edit</a>

                        <!-- Delete User -->
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display: inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>

                        <!-- Enable User -->
                        @if (!$user->enabled)
                            <form action="{{ route('users.enable', $user->id) }}" method="POST" style="display: inline">
                                @csrf
                                @method('PUT')
                                <button type="submit">Enable</button>
                            </form>
                        @else
                            <!-- Disable User -->
                            <form action="{{ route('users.disable', $user->id) }}" method="POST" style="display: inline">
                                @csrf
                                @method('PUT')
                                <button type="submit">Disable</button>
                            </form>
                        @endif

                        <!-- Assign Role -->
                        <form action="{{ route('users.assignRole', $user->id) }}" method="POST" style="display: inline">
                            @csrf
                            @method('PUT')
                            <label for="role_id">Role:</label>
                            <select name="role_id" id="role_id" required>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                            <button type="submit">Assign Role</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
