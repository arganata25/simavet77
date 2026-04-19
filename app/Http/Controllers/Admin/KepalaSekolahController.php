<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class KepalaSekolahController extends Controller
{
    public function index()
    {
        $data = Guru::whereHas('user', function ($q) {
            $q->where('role', 'kepala_sekolah');
        })->with('user')->latest()->get();

        return view('admin.kepala_sekolah.index', compact('data'));
    }

    public function create()
    {
        return view('admin.kepala_sekolah.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required',
            'email' => 'required|email|unique:users,email',
        ]);

        // 1. Buat akun login
        $user = User::create([
            'name' => $request->nama_lengkap,
            'email' => $request->email,
            'password' => Hash::make('12345678'), // default password
            'role' => 'kepala_sekolah',
            'is_active' => true
        ]);

        // 2. Buat data kepala sekolah (pakai tabel guru)
        Guru::create([
            'user_id' => $user->id,
            'nama_lengkap' => $request->nama_lengkap,
            'nip' => 'KS' . rand(1000,9999),
            'jenis_kelamin' => $request->jenis_kelamin,
            'no_hp' => $request->no_hp,
        ]);

        return redirect()->route('admin.kepala_sekolah.index')
            ->with('success', 'Kepala sekolah berhasil ditambahkan');
    }

    public function edit($id)
    {
        $data = Guru::with('user')->findOrFail($id);
        return view('admin.kepala_sekolah.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = Guru::with('user')->findOrFail($id);

        $data->update([
            'nama_lengkap' => $request->nama_lengkap,
        ]);

        $data->user->update([
            'name' => $request->nama_lengkap,
            'email' => $request->email,
        ]);

        return back()->with('success', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        $data = Guru::with('user')->findOrFail($id);

        // hapus user juga
        $data->user->delete();
        $data->delete();

        return back()->with('success', 'Data berhasil dihapus');
    }
}