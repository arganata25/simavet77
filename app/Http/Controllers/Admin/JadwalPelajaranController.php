<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JadwalPelajaran;
use App\Models\MataPelajaran;
use App\Models\Kelas;
use App\Models\Guru;
use App\Models\TahunAjaran;

class JadwalPelajaranController extends Controller
{
    // ================= INDEX =================
    public function index()
    {
        $jadwal = JadwalPelajaran::with(['guru','kelas','mapel'])
            ->orderBy('hari')
            ->orderBy('jam_mulai')
            ->get();

        return view('admin.jadwal_pelajaran.index', compact('jadwal'));
    }

    // ================= CREATE =================
    public function create()
    {
        return view('admin.jadwal_pelajaran.create', [
            'guru' => Guru::all(),
            'kelas' => Kelas::all(),
            'mapel' => MataPelajaran::all(),
        ]);
    }

    // ================= STORE =================
    public function store(Request $request)
    {
        $request->validate([
            'guru_id' => 'required',
            'kelas_id' => 'required',
            'mata_pelajaran_id' => 'required',
            'hari' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
        ]);

        // 🔥 ambil tahun ajaran aktif
        $tahun = TahunAjaran::where('is_aktif', true)->first();
        if (!$tahun) {
            return back()->with('error', 'Tidak ada tahun ajaran aktif!');
        }

        // 🔴 CEK BENTROK (VERSI BENAR)
        $bentrok = JadwalPelajaran::where('hari', $request->hari)
            ->where(function($q) use ($request) {
                $q->where(function($q2) use ($request) {
                    $q2->where('guru_id', $request->guru_id)
                       ->orWhere('kelas_id', $request->kelas_id);
                });
            })
            ->where(function($q) use ($request) {
                $q->where('jam_mulai', '<', $request->jam_selesai)
                  ->where('jam_selesai', '>', $request->jam_mulai);
            })
            ->exists();

        if ($bentrok) {
            return back()->with('error', 'Jadwal bentrok (guru / kelas sudah terisi di jam tersebut)');
        }

        JadwalPelajaran::create([
            'guru_id' => $request->guru_id,
            'kelas_id' => $request->kelas_id,
            'mata_pelajaran_id' => $request->mata_pelajaran_id,
            'tahun_ajaran_id' => $tahun->id,
            'hari' => $request->hari,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
        ]);

        return redirect()->route('admin.jadwal-pelajaran.index')
            ->with('success', 'Jadwal berhasil ditambahkan');
    }

    // ================= EDIT =================
    public function edit($id)
    {
        return view('admin.jadwal_pelajaran.edit', [
            'jadwal' => JadwalPelajaran::findOrFail($id),
            'guru' => Guru::all(),
            'kelas' => Kelas::all(),
            'mapel' => MataPelajaran::all(),
        ]);
    }

    // ================= UPDATE =================
    public function update(Request $request, $id)
    {
        $jadwal = JadwalPelajaran::findOrFail($id);

        $request->validate([
            'guru_id' => 'required',
            'kelas_id' => 'required',
            'mata_pelajaran_id' => 'required',
            'hari' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
        ]);

        // 🔴 CEK BENTROK SAAT UPDATE
        $bentrok = JadwalPelajaran::where('id', '!=', $id)
            ->where('hari', $request->hari)
            ->where(function($q) use ($request) {
                $q->where('guru_id', $request->guru_id)
                  ->orWhere('kelas_id', $request->kelas_id);
            })
            ->where(function($q) use ($request) {
                $q->where('jam_mulai', '<', $request->jam_selesai)
                  ->where('jam_selesai', '>', $request->jam_mulai);
            })
            ->exists();

        if ($bentrok) {
            return back()->with('error', 'Jadwal bentrok saat update!');
        }

        $jadwal->update([
            'guru_id' => $request->guru_id,
            'kelas_id' => $request->kelas_id,
            'mata_pelajaran_id' => $request->mata_pelajaran_id,
            'hari' => $request->hari,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
        ]);

        return redirect()->route('admin.jadwal-pelajaran.index')
            ->with('success', 'Jadwal berhasil diupdate');
    }

    // ================= DELETE =================
    public function destroy($id)
    {
        JadwalPelajaran::findOrFail($id)->delete();
        return back()->with('success', 'Masuk recycle bin');
    }

    // ================= TRASH =================
    public function trash()
    {
        $jadwal = JadwalPelajaran::onlyTrashed()
            ->with(['guru','kelas','mapel'])
            ->get();

        return view('admin.jadwal_pelajaran.trash', compact('jadwal'));
    }

    // ================= RESTORE =================
    public function restore($id)
    {
        JadwalPelajaran::withTrashed()->findOrFail($id)->restore();
        return back()->with('success', 'Berhasil dipulihkan');
    }

    // ================= FORCE DELETE =================
    public function forceDelete($id)
    {
        JadwalPelajaran::withTrashed()->findOrFail($id)->forceDelete();
        return back()->with('success', 'Dihapus permanen');
    }

    // ================= SHOW =================
    public function show($id)
    {
        $jadwal = JadwalPelajaran::with(['guru','kelas','mapel'])->findOrFail($id);
        return view('admin.jadwal_pelajaran.show', compact('jadwal'));
    }
}