<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('welcome');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);
    
        $credentials = $request->only('username', 'password');
    
        // Tambahkan logika untuk admin
        if ($credentials['username'] === 'admin' && $credentials['password'] === 'admin123456789') {
            return redirect('/admin');
        }
    
        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('/home');
        }
    
        return back()->withErrors([
            'username' => 'Username atau password salah!',
        ])->onlyInput('username');
    }
    
}

