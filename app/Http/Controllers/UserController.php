<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    // Menampilkan halaman login
    public function showLogin()
    {
        // Jika sudah login, arahkan sesuai role
        if (session()->has('id_user')) {
            return $this->redirectByRole(session('role'));
        }

        return view('home.login');
    }

    // Proses login
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ], [
            'username.required' => 'Username wajib diisi.',
            'password.required' => 'Password wajib diisi.',
        ]);

        // Mencari pengguna berdasarkan username
        $user = User::where('username', $request->username)->first();

        // Memeriksa username dan password
        if (!$user || !Hash::check($request->password, $user->password)) {
            return back()
                ->withInput($request->only('username'))
                ->withErrors([
                    'login_error' => 'Username atau password salah.',
                ]);
        }

        // Memastikan role valid
        $role = strtolower(trim($user->nama_role));

        if (!in_array($role, ['admin', 'petugas', 'peminjam'])) {
            return back()
                ->withInput($request->only('username'))
                ->withErrors([
                    'login_error' => 'Role pengguna tidak valid.',
                ]);
        }

        // Membuat session baru
        $request->session()->regenerate();

        // Menyimpan data pengguna ke session
        $request->session()->put([
            'id_user'   => $user->id_user,
            'nama_user' => $user->nama_user,
            'username'  => $user->username,
            'role'      => $role,
        ]);

        // Mengarahkan pengguna berdasarkan role
        return $this->redirectByRole($role)
            ->with('success', 'Selamat datang, ' . $user->nama_user . '!');
    }

    // Pengalihan dashboard berdasarkan role
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
                session()->invalidate();

                return redirect()->route('login')
                    ->withErrors([
                        'login_error' => 'Role pengguna tidak valid.',
                    ]);
        }
    }

    // Proses logout
    public function logout(Request $request)
    {
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')
            ->with('success', 'Anda berhasil logout.');
    }
}