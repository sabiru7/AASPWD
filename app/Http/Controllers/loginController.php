<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Menampilkan form login
    public function showLoginForm()
    {
        return view('auth.login'); // Pastikan ini sesuai dengan view Anda
    }

    // Proses login
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Mencoba autentikasi pengguna
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Jika login berhasil, redirect ke halaman yang diinginkan
            return redirect()->intended('dashboard'); // Ubah 'dashboard' sesuai kebutuhan Anda
        }

        // Jika login gagal, kembali ke form dengan pesan error
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->withInput($request->only('email')); // Menyimpan email yang dimasukkan untuk kemudahan pengguna
    }

    // Metode untuk logout
    public function logout(Request $request)
    {
        Auth::logout(); // Melakukan logout pengguna

        // Redirect ke halaman login setelah logout
        return redirect('/login')->with('success', 'You have been logged out successfully.');
    }
}