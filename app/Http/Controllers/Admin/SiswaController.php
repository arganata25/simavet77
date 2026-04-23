<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SiswaController extends Controller
{
    // =========================
    // INDEX
    // =========================
    public function index(Request $request)
    {
        $search = $request->search;

        $siswa = Siswa::with(['kelas', 'user'])
            ->when($search, function ($q) use ($search) {
                $q->where('nama_lengkap', 'like', "%$search%")
                  ->orWhere('nisn', 'like', "%$search%");
            })
            ->latest()
            ->paginate(10);

            $kelas = Kelas::all();
        return view('admin.siswa.index', compact('siswa', 'kelas'));
    }

    // =========================
    // CREATE
    // =========================
    public function create()
    {
        $kelas = Kelas::all();
        return view('admin.siswa.create', compact('kelas'));
    }

    // =========================
    // STORE
    // =========================
    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap'  => 'required|string|max:100',
            'nisn'          => 'required|unique:siswa,nisn',
            'kelas_id'      => 'required|exists:kelas,id',
            'tingkat'       => 'required|in:X,XI,XII',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
        ]);

        DB::beginTransaction();
        try {
            // USER LOGIN
            $user = User::create([
                'name'     => $request->nama_lengkap,
                'email'    => $request->nisn . '@siswa.com',
                'password' => Hash::make('12345678'),
                'role'     => 'siswa'
            ]);

            // DATA SISWA
            Siswa::create([
                'user_id'       => $user->id,
                'kelas_id'      => $request->kelas_id,
                'tingkat'       => $request->tingkat,
                'nama_lengkap'  => $request->nama_lengkap,
                'nisn'          => $request->nisn,
                'jenis_kelamin' => $request->jenis_kelamin,
                'no_hp_siswa'   => $request->no_hp_siswa,
                'status'        => 'aktif'
            ]);

            DB::commit();

            return redirect()->route('admin.siswa.index')
                ->with('success', 'Siswa berhasil ditambahkan');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()->with('error', $e->getMessage());
        }
    }

    // =========================
    // EDIT
    // =========================
    public function edit($id)
    {
        $siswa = Siswa::findOrFail($id);
        $kelas = Kelas::all();

        return view('admin.siswa.edit', compact('siswa', 'kelas'));
    }

    // =========================
    // UPDATE
    // =========================
    public function update(Request $request, $id)
    {
        $siswa = Siswa::findOrFail($id);

        $request->validate([
            'nama_lengkap'  => 'required|string|max:100',
            'nisn'          => 'required|unique:siswa,nisn,' . $siswa->id,
            'kelas_id'      => 'required|exists:kelas,id',
            'tingkat'       => 'required|in:X,XI,XII',
            'jenis_kelamin' => 'required',
        ]);

        DB::beginTransaction();
        try {
            $siswa->update([
                'nama_lengkap'  => $request->nama_lengkap,
                'nisn'          => $request->nisn,
                'kelas_id'      => $request->kelas_id,
                'tingkat'       => $request->tingkat,
                'jenis_kelamin' => $request->jenis_kelamin,
                'no_hp_siswa'   => $request->no_hp_siswa,
            ]);

            // sync user
            if ($siswa->user) {
                $siswa->user->update([
                    'name'  => $request->nama_lengkap,
                    'email' => $request->nisn . '@siswa.com'
                ]);
            }

            DB::commit();

            return redirect()->route('admin.siswa.index')
                ->with('success', 'Data siswa berhasil diupdate');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', $e->getMessage());
        }
    }

    // =========================
    // DELETE
    // =========================
    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $siswa = Siswa::findOrFail($id);

            // hapus user dulu (hindari FK error)
            if ($siswa->user_id) {
                User::where('id', $siswa->user_id)->delete();
            }

            // hapus siswa
            $siswa->delete();

            DB::commit();

            return back()->with('success', 'Siswa berhasil dihapus');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', $e->getMessage());
        }
    }
}