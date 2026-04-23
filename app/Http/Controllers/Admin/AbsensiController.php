<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Absensi;
use App\Models\Siswa;
use App\Models\JadwalPelajaran;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    // =================
    // INDEX
    // =================
    public function index()
    {
        $absensi = Absensi::with('siswa')->latest()->get();

        return view('admin.absensi.index', compact('absensi'));
    }

    // =================
    // CREATE
    // =================
    public function create()
    {
        $siswa = Siswa::all();
        $jadwal = JadwalPelajaran::with(['guru','kelas','mapel'])->get();

        return view('admin.absensi.create', compact('siswa', 'jadwal'));
    }

    // =================
    // STORE
    // =================
    public function store(Request $request)
    {
        $data = $request->validate([
            'siswa_id' => 'required|exists:siswa,id',
            'tanggal' => 'required|date',
            'status' => 'required|in:hadir,izin,alpha',
            'keterangan' => 'nullable|string',
            'jadwal_pelajaran_id' => 'required|exists:jadwal_pelajaran,id',
        ]);

        Absensi::create($data);

        return redirect()->route('admin.absensi.index')
            ->with('success', 'Absensi berhasil disimpan');
    }

    // =================
    // EDIT
    // =================
    public function edit($id)
    {
        $absensi = Absensi::findOrFail($id);
        $siswa = Siswa::all();

        return view('admin.absensi.edit', compact('absensi','siswa'));
    }

    // =================
    // UPDATE
    // =================
    public function update(Request $request, $id)
    {
        $absensi = Absensi::findOrFail($id);

        $data = $request->validate([
            'siswa_id' => 'required|exists:siswa,id',
            'tanggal' => 'required|date',
            'status' => 'required|in:hadir,izin,alpha',
            'keterangan' => 'nullable|string'
        ]);

        $absensi->update($data);

        return redirect()->route('admin.absensi.index')
            ->with('success', 'Absensi berhasil diupdate');
    }

    // =================
    // DELETE
    // =================
    public function destroy($id)
    {
        Absensi::findOrFail($id)->delete();

        return back()->with('success', 'Absensi dihapus');
    }
}