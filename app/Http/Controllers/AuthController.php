<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function loginProcess(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {

            // 🔹 ADMIN
            if (auth()->user()->role === 'admin') {
                return redirect('/admin/dashboard');
            }

            // 🔹 STAFF
            if (auth()->user()->role === 'staff') {
                return redirect('/staff/dashboard');
            }

            // 🔹 ROLE LAIN (guest, dll)
            Auth::logout();
            return back()->with('error', 'Role tidak diizinkan');
        }

        return back()->with('error', 'Email atau password salah');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
