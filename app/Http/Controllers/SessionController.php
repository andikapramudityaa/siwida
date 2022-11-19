<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    public function login()
    {
        return view('login', [
            'pageTitle' => 'Masuk'
        ]);
    }

    public function validateAccount(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            //TODO ADMIN REDIRECT TO ADMIN MENU
            if (auth()->user()->isAdmin) {
                return redirect()->intended('/admin/tourisms');
            }

            return redirect()->intended('/');
        }

        return back()->with('loginError', 'Login gagal');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
