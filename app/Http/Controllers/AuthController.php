<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showRegister()
    {
        return view('auth.register'); // Ganti 'auth.register' dengan nama file view Anda
    }

    // 2. Proses Data Register
    public function register(Request $request)
    {
        dd($request);
        // Validasi input
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:255' // Password minimal 5 karakter
        ]);
        
        
        // Enkripsi Password
        $validatedData['password'] = Hash::make($validatedData['password']);

        // Simpan ke Database
        User::create($validatedData);

        return redirect()->route('login')->with('success', 'Registrasi berhasil! Silakan login');
    }

    public function showLogin()
    {
        return view('auth.login'); // Ganti 'auth.login' dengan nama file view Anda
    }

    // 2. Proses Login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('home')->with('success', 'Login berhasil'); // Ganti '/dashboard' dengan halaman tujuan setelah login
        }

        // Jika gagal login, kembalikan ke halaman login dengan error
        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    }

    // --- LOGIKA LOGOUT ---
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
