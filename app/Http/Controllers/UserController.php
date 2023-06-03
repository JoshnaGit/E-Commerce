<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

use App\Models\UsersData;
use App\Models\Role;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function isAdmin()
    {
        return Auth::user()->role_id === Role::ADMIN_ROLE_ID; // Replace `ADMIN_ROLE_ID` with the actual ID for the admin role.
    }
    public function index()
    {
        $users = UsersData::all();
        $roles = Role::all();
        return view('users.index', compact('users','roles'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'role_id' => 'required|exists:roles,id',
        ]);

        $user = UsersData::create($validatedData);

        return redirect()->route('users.index')
            ->with('success', 'User created successfully.');
    }

    public function edit(UsersData $user)
    {
        $roles = Role::all();
        return view('users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, UsersData $user)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:8',
            'role_id' => 'required|exists:roles,id',
        ]);

        $user->update($validatedData);

        return redirect()->route('users.index')
            ->with('success', 'User updated successfully.');
    }

    public function destroy(UsersData $user)
    {
        $user->delete();

        return redirect()->route('users.index')
            ->with('success', 'User deleted successfully.');
    }

    public function enable(UsersData $user)
    {
        $user->enabled = true;
        $user->save();

        return redirect()->route('users.index')
            ->with('success', 'User enabled successfully.');
    }

    public function disable(UsersData $user)
    {
        $user->enabled = false;
        $user->save();

        return redirect()->route('users.index')
            ->with('success', 'User disabled successfully.');
    }

    public function assignRole(Request $request, UsersData $user)
    {
        $validatedData = $request->validate([
            'role_id' => 'required|exists:roles,id',
        ]);

        $user->role_id = $validatedData['role_id'];
        $user->save();

        return redirect()->route('users.index')
            ->with('success', 'User role assigned successfully.');
    }
}
