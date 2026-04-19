<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class GuruController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $guru = Guru::with('user')
            ->when($search, function ($q) use ($search) {
                $q->where('nama_lengkap', 'like', "%$search%");
            })
            ->latest()
            ->paginate(10);

        return view('admin.guru.index', compact('guru'));
    }

public function store(Request $request)
{
    $request->validate([
        'nama_lengkap' => 'required',
        'nip' => 'required',
        'no_hp' => 'required'
    ]);

    DB::beginTransaction();

    try {

        $user = User::create([
            'name' => $request->nama_lengkap,
            'email' => strtolower(str_replace(' ', '', $request->nama_lengkap)) . '@guru.com',
            'password' => bcrypt('password123'),
            'role' => 'guru'
        ]);

        Guru::create([
            'user_id' => $user->id,
            'nama_lengkap' => $request->nama_lengkap,
            'nip' => $request->nip,
            'jenis_kelamin' => $request->jenis_kelamin ?? 'Laki-laki',
            'no_hp' => $request->no_hp,
        ]);

        DB::commit();

        return redirect()->route('admin.guru.index');

    } catch (\Exception $e) {
        DB::rollback();
        dd($e->getMessage());
    }
}

    public function update(Request $request, Guru $guru)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:100',
            'nip' => 'required|string|max:20',
        ]);

        DB::beginTransaction();
        try {

            // update guru
            $guru->update([
                'nama_lengkap' => $request->nama_lengkap,
                'nip' => $request->nip,
                'no_hp' => $request->no_hp,
            ]);

            // update user juga
            if ($guru->user) {
                $guru->user->update([
                    'name' => $request->nama_lengkap
                ]);
            }

            DB::commit();

            return back()->with('success', 'Guru berhasil diupdate');

        } catch (\Exception $e) {
            DB::rollback();
            return back()->with('error', $e->getMessage());
        }
    }

    public function destroy(Guru $guru)
    {
        DB::beginTransaction();
        try {

            // hapus user juga
            if ($guru->user) {
                $guru->user->delete();
            }

            $guru->delete();

            DB::commit();

            return back()->with('success', 'Guru berhasil dihapus');

        } catch (\Exception $e) {
            DB::rollback();
            return back()->with('error', $e->getMessage());
        }
    }
}