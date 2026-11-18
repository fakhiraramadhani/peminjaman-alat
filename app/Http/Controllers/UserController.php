<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest('id_user')->get();
        return view('home.user.index', compact('users'));
    }

    public function create()
    {
        return view('home.user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_user' => 'required|string|max:100',
            'username'  => 'required|string|max:50|unique:user,username',
            'password'  => 'required|string|min:6',
            'nama_role' => 'required|string|max:30',
            'no_telp'   => 'nullable|string|max:20',
        ]);

        User::create([
            'nama_user' => $request->nama_user,
            'username'  => $request->username,
            'password'  => Hash::make($request->password),
            'nama_role' => $request->nama_role,
            'no_telp'   => $request->no_telp,
        ]);

        return redirect()->route('user.index')->with('success', 'Data user berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('home.user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'nama_user' => 'required|string|max:100',
            'username'  => 'required|string|max:50|unique:user,username,' . $user->id_user . ',id_user',
            'password'  => 'nullable|string|min:6',
            'nama_role' => 'required|string|max:30',
            'no_telp'   => 'nullable|string|max:20',
        ]);

        $data = [
            'nama_user' => $request->nama_user,
            'username'  => $request->username,
            'nama_role' => $request->nama_role,
            'no_telp'   => $request->no_telp,
        ];

        
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect()->route('user.index')->with('success', 'Data user berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('user.index')->with('success', 'Data user berhasil dihapus.');
    }
}
