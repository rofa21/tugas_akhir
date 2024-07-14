<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function showUsers()
    {
        $users = User::all();
        
        return view('admin.pelanggan', compact('users'));
    }
}

