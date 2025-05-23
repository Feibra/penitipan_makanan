<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login ()
    {
            return view('auth.login');
    }

    public function actionlogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Autentikasi user
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Periksa apakah user ditemukan
            $user = Auth::user();
            if ($user) {
                // Redirect berdasarkan role
                if ($user->role === 'admin') {
                    return redirect()->route('admin.dashboard');
                } elseif ($user->role == 'participant') {
                    return redirect()->route('pengunjung.dashboard');
                }
            }
        }

        // Jika login gagal, kembalikan error
        return redirect()->back()->with('error', 'Email Dan Password Tidak Cocok.');
    }

    public function actionlogout (Request $request)
    {
        Auth::logout();
        return redirect('/');
    }
}
