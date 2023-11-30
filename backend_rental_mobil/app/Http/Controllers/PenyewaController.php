<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PenyewaController extends Controller
{
    public function login() {
        return view('penyewa.login');
    }

    public function auth(Request $request) {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $credential = $request->only('username', 'password');
        if(Auth::guard('penyewa')->attempt($credential)) {
            $request->get('remember');
            return redirect()->intended('/penyewa');
        }
    }
}
