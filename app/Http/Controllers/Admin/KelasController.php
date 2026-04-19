<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\Guru;
use App\Models\TahunAjaran;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index()
    {
        $kelas = Kelas::with(['waliKelas', 'tahunAjaran'])
            ->latest()
            ->paginate(10);

        return view('admin.kelas.index', compact('kelas'));
    }

    // ✅ FIX DI SINI (hapus whereHas)
    public function create()
    {
        $gurus = Guru::all(); // 🔥 FIX
        $tahunAjaran = TahunAjaran::all();

        return view('admin.kelas.create', compact('gurus', 'tahunAjaran'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:20|unique:kelas,nama',
            'tingkat' => 'required|in:X,XI,XII',
            'jurusan' => 'required|string|max:50',
            'wali_kelas_id' => 'nullable|exists:guru,id',
            'tahun_ajaran_id' => 'required|exists:tahun_ajaran,id',
        ]);

        Kelas::create([
            'nama' => $request->nama,
            'tingkat' => $request->tingkat,
            'jurusan' => $request->jurusan,
            'kapasitas' => 36,
            'wali_kelas_id' => $request->wali_kelas_id,
            'tahun_ajaran_id' => $request->tahun_ajaran_id,
        ]);

        return redirect()->route('admin.kelas.index')
            ->with('success', 'Data kelas berhasil ditambahkan.');
    }

    public function edit(Kelas $kela)
    {
        $gurus = Guru::all();
        $tahunAjaran = TahunAjaran::all();

        return view('admin.kelas.edit', compact('kela', 'gurus', 'tahunAjaran'));
    }

    public function update(Request $request, Kelas $kela)
    {
        $request->validate([
            'nama' => 'required',
            'tingkat' => 'required',
            'jurusan' => 'required',
            'wali_kelas_id' => 'nullable|exists:guru,id',
            'tahun_ajaran_id' => 'required|exists:tahun_ajaran,id',
        ]);

        $kela->update([
            'nama' => $request->nama,
            'tingkat' => $request->tingkat,
            'jurusan' => $request->jurusan,
            'wali_kelas_id' => $request->wali_kelas_id,
            'tahun_ajaran_id' => $request->tahun_ajaran_id,
        ]);

        return redirect()->route('admin.kelas.index')
            ->with('success', 'Data kelas berhasil diupdate');
    }

    public function destroy(Kelas $kela)
    {
        $kela->forceDelete();

        return redirect()->route('admin.kelas.index')
            ->with('success', 'Data kelas berhasil dihapus.');
    }
}