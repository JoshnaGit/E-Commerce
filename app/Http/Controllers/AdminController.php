<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        // Logic for admin dashboard
        return view('admin.dashboard');
    }
}
