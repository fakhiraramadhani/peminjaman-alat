<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    // Menampilkan halaman login
    public function showLogin()
    {
        if (session()->has('id_user')) {

            // Arahkan berdasarkan role
            return $this->redirectByRole(session('role'));
        }

        return view('home.login');
    }

    // Proses login
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ], [
            'username.required' => 'Username wajib diisi.',
            'password.required' => 'Password wajib diisi.',
        ]);

        // Cari user berdasarkan username
        $user = User::where('username', $request->username)->first();

        // Periksa password
        if ($user && Hash::check($request->password, $user->password)) {

            // Simpan data ke session
            $request->session()->regenerate();

            session([
                'id_user'   => $user->id_user,
                'nama_user' => $user->nama_user,
                'username'  => $user->username,
                'role'      => $user->nama_role,
            ]);

            // Arahkan sesuai role
            return $this->redirectByRole($user->nama_role)
                ->with('success', 'Selamat datang, ' . $user->nama_user . '!');
        }

        // Jika username atau password salah
        return back()
            ->withInput($request->only('username'))
            ->withErrors([
                'login_error' => 'Username atau password salah.',
            ]);
    }

    // Fungsi pengalihan berdasarkan role
    private function redirectByRole($role)
    {
        switch ($role) {

            case 'admin':
                return redirect()->route('admin.dashboard');

            case 'petugas':
                return redirect()->route('petugas.dashboard');

            case 'peminjam':
                return redirect()->route('peminjam.dashboard');

            default:
                session()->flush();

                return redirect()->route('login')
                    ->withErrors([
                        'login_error' => 'Role pengguna tidak valid.',
                    ]);
        }
    }

    // Logout
    public function logout(Request $request)
    {
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')
            ->with('success', 'Anda berhasil logout.');
    }
}
