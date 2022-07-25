<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    // Show the application dashboard.
    public function dashboard()
    {
        $user = Auth::user();

        return view('admin.dashboard');
    }
}
