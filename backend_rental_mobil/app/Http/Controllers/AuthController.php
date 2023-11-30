<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login() {
        return view('auth.login');
    }

    public function auth(Request $request) {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $credential = $request->only('username', 'password');
        if(Auth::guard('web')->attempt($credential)) {
            return redirect()->intended('/');
        }
        // elseif(Auth::guard('penyewa')->attempt($credential)) {
        //     return redirect()->intended('/');
        // }
    }

    public function logout() {

        Session::flush();
        Auth::logout();

        return redirect()->route('auth.login');
    }
}
