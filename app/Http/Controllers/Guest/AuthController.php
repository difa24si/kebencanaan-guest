<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    //Menampilkan halaman login
    public function index()
    {
        return view('guest.login-form');
    }

    // Memproses form login
    public function login(Request $request)
    {
        // 🔸 Validasi input
        $validated = $request->validate([
            'username' => 'required',
            'password' => [
                'required',
                'min:3',
                'regex:/[A-Z]/' // harus ada huruf kapital
            ],
        ], [
            'username.required' => 'Username wajib diisi.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal 3 karakter.',
            'password.regex' => 'Password harus mengandung huruf kapital.',
        ]);

        // 🔸 Logika jika username dan password sama
        if ($request->username === $request->password) {
            // Jika benar, arahkan ke halaman berhasil
            return view('guest.berhasil', [
                'username' => $request->username
            ]);
        }

        // 🔸 Jika tidak sesuai, kembali ke halaman login dengan pesan error
        return back()->withErrors([
            'login' => 'Username dan password harus sama agar bisa login.',
        ])->withInput();
    }
}
