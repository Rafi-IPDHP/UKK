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
            'NIK' => 'required',
            'nama' => 'required',
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
            'no_telp_darurat' => 'required',
            'role' => 'required',
        ]);

        User::create($request->all());
        return redirect()->route('auth.login');
    }

    public function login() {
        return view('auth.login');
    }

    public function auth(Request $request) {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('username', 'password');
        if(Auth::attempt($credentials)) {
            return redirect()->intended('/');
        }
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
