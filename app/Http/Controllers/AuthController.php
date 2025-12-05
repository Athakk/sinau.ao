<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function login()
    {
        return view('auth.login'); 
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = User::where('email', $credentials['email'])->first();

            if ($user->level == 'admin') {
                return redirect()->intended('/admin')->with('success', 'Berhasil login');
            } elseif ($user->level == 'user') {
                return redirect()->intended('/')->with('success', 'Berhasil login');
            }
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    }

    public function register()
    {
        return view('auth.register'); 
    }

    public function createRegister(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required' 
        ]);
        
        
        $request['password'] = Hash::make($request['password']);

        User::create($request->all());

        return redirect()->route('login')->with('success', 'Registrasi berhasil! Silakan login');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')->with('success', 'Berhasil logout');
    }
}
