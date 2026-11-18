<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLogin()
    {
        if (session()->has('id_user')) {
        
            return redirect()->route('dashboard');
        }
        return view('home.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ], [
            'username.required' => 'Username wajib diisi.',
            'password.required' => 'Password wajib diisi.',
        ]);

        $user = User::where('username', $request->username)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            session([
                'id_user'   => $user->id_user,
                'nama_user' => $user->nama_user,
                'username'  => $user->username,
                'role'      => $user->nama_role,
            ]);

            
            return redirect()->route('dashboard')->with('success', 'Selamat datang, ' . $user->nama_user . '!');
        }
        return back()
        ->withInput($request->only('username'))
        ->withErrors([
            'login_error' => 'Username atau password salah.',
        ]);
    }

    public function logout(Request $request)
    {
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Anda berhasil logout.');
    }
}
