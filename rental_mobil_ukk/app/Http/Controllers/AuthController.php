<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class AuthController extends Controller
{
    public function register() {
        return view('auth.register');
    }

    public function registerPetugas() {
        return view('auth.registerPetugas');
    }

    public function store(Request $request) {
        $request->validate([
            'NIK' => 'required|unique:users,NIK',
            'nama' => 'required',
            'username' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
            'no_telp_darurat' => 'required',
            'role' => 'required',
        ]);
        // dd($request);

        User::create($request->all());
        return redirect()->route('auth.login');
    }

    public function login() {
        return view('auth.login');
    }

    public function auth(Request $request) {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if(Auth::attempt($credentials)) {
            return redirect()->intended('/');
        }

        return redirect()->route('auth.login')->withSuccess('Email atau Password salah, silakan coba lagi!');
    }

    public function logout() {
        Session::flush();
        Auth::logout();

        return redirect()->route('auth.login');
    }

    public function user($user_id) {
        $dataUser = User::where('id', $user_id)->get();
        return view('user.index', compact('dataUser'));
    }
}
