<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Users;

class LoginController extends Controller
{
    public function login(Request $request)
{
    $credentials = $request->only('Email', 'Password');

    if (Auth::attempt($credentials)) {
        // Authentication passed...
        $totalUsers = User::count();
        return redirect()->intended('/dashboard')->with('totalUsers', $totalUsers);
        // return redirect()->intended('/dashboard'); // Use intended() for proper redirect
    }

    // Add detailed error logging
    Log::error('Login failed for email: '.$request->email);
    
    return back()->withErrors([
        'email' => 'The provided credentials do not match our records.',
    ]);
}


    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/webpage');
    }
}