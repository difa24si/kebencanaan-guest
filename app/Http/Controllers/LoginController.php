<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    // Tampilkan form login
    public function index()
    {
        return view('pages.user.login');
    }

    // Proses login
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Ambil user berdasarkan email
        $user = User::where('email', $request->email)->first();

        // Cek apakah user ada dan password cocok
        if (!$user || !Hash::check($request->password, $user->password)) {
            return back()->with('error', 'Email atau password salah!');
        }

        // Login user
        Auth::login($user);

        //  Arahkan langsung ke dashboard view (bukan route)
        return redirect()->route('dashboard')
    ->with('success', 'Login berhasil!');

    }

    // Logout user
    public function destroy()
    {
        Auth::logout();
        return redirect()->route('login.index')->with('success', 'Anda telah logout.');
    }
}
