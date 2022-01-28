<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->withErrors([
            'username' => 'Invalid Credentials',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        //invalidate and regenerate new CSRF tokens
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
