<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use App\Models\Kelas;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SiswaController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $siswa = Siswa::with(['kelas.tahunAjaran'])
            ->when($search, function ($q) use ($search) {
                $q->where('nama_lengkap', 'like', "%$search%")
                  ->orWhere('nisn', 'like', "%$search%");
            })
            ->latest()
            ->paginate(10);

        return view('admin.siswa.index', compact('siswa'));
    }

    public function create()
    {
        $kelas = Kelas::all();
        return view('admin.siswa.create', compact('kelas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required',
            'nisn' => 'required|unique:siswa,nisn',
            'kelas_id' => 'required|exists:kelas,id',
            'jenis_kelamin' => 'required',
            'no_hp_siswa' => 'required',
        ]);

       $user = User::create([
        'name' => $request->nama_lengkap,
        'email' => $request->nisn.'@siswa.com',
        'password' => Hash::make('12345678'),
        'role' => 'siswa'
    ]);

    Siswa::create([
        'user_id' => $user->id,
        'kelas_id' => $request->kelas_id,
        'nama_lengkap' => $request->nama_lengkap,
        'nisn' => $request->nisn,
        'jenis_kelamin' => $request->jenis_kelamin,
        'no_hp_siswa' => $request->no_hp_siswa,
        'status' => 'aktif'
    ]);


        return redirect()->route('admin.siswa.index')
            ->with('success', 'Siswa berhasil ditambahkan');
    }

    public function edit($id)
    {
        $siswa = Siswa::findOrFail($id);
        $kelas = Kelas::all();

        return view('admin.siswa.edit', compact('siswa', 'kelas'));
    }

    public function update(Request $request, $id)
    {
        $siswa = Siswa::findOrFail($id);

        $request->validate([
            'nama_lengkap' => 'required',
            'nisn' => 'required|unique:siswa,nisn,' . $siswa->id,
            'kelas_id' => 'required|exists:kelas,id',
            'jenis_kelamin' => 'required',
        ]);

        $siswa->update([
            'nama_lengkap' => $request->nama_lengkap,
            'nisn' => $request->nisn,
            'kelas_id' => $request->kelas_id,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat' => $request->alamat,
            'no_hp_siswa' => $request->no_hp_siswa,
            'no_hp_ortu' => $request->no_hp_ortu,
        ]);

        return redirect()->route('admin.siswa.index')
            ->with('success', 'Siswa berhasil diupdate');
    }

    public function destroy($id)
    {
        Siswa::findOrFail($id)->delete();

        return back()->with('success', 'Siswa berhasil dihapus');
    }
}