<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Siswa;
use App\Models\Guru;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::when($request->search, function ($q) use ($request) {
            $q->where('name', 'like', '%' . $request->search . '%');
        })
        ->when($request->role, function ($q) use ($request) {
            $q->where('role', $request->role);
        })
        ->latest()
        ->paginate(10);

        return view('admin.users.index', compact('users'));
    }

public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:100',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6',
        'role' => 'required|in:admin,guru,siswa,kepala_sekolah'
    ]);

    DB::beginTransaction();

    try {
        // 1. buat user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role
        ]);

        // 2. AUTO CREATE SESUAI ROLE

        if ($user->role == 'siswa') {
            Siswa::create([
                'user_id' => $user->id,
                'nama_lengkap' => $request->name,
                'nisn' => rand(1000000000,9999999999),
                'jenis_kelamin' => $request->jenis_kelamin ?? 'Laki-laki',
                'status' => 'aktif'
            ]);
        }

        if ($user->role == 'guru' || $user->role == 'kepala_sekolah') {
            Guru::create([
                'user_id' => $user->id,
                'nama_lengkap' => $request->name,
                'nip' => $user->role == 'kepala_sekolah'
                    ? 'KS'.rand(1000,9999)
                    : rand(10000,99999),
                'jenis_kelamin' => $request->jenis_kelamin ?? 'Laki-laki'
            ]);
        }

        DB::commit();

        return back()->with('success', 'User berhasil dibuat');

    } catch (\Exception $e) {
        DB::rollBack();

        return back()->with('error', $e->getMessage());
    }
}

    public function update(Request $request, User $user)
    {
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
        ]);

        return back()->with('success', 'User diupdate');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return back()->with('success', 'User dihapus');
    }
}