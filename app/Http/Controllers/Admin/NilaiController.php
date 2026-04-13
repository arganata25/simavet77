<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Nilai;
use App\Models\Siswa;
use App\Models\MataPelajaran;
use App\Models\TahunAjaran;
use App\Models\Guru;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    // LIST
    public function index(Request $request)
    {
        $query = Nilai::with(['siswa', 'mataPelajaran', 'guru', 'tahunAjaran']);

        // filter opsional
        if ($request->filled('kelas_id')) {
            $query->whereHas('siswa', fn($q) =>
                $q->where('kelas_id', $request->kelas_id)
            );
        }

        if ($request->filled('mapel_id')) {
            $query->where('mata_pelajaran_id', $request->mapel_id);
        }

        if ($request->filled('tahun_ajaran_id')) {
            $query->where('tahun_ajaran_id', $request->tahun_ajaran_id);
        }

        $nilai = $query->latest()->paginate(10);

        return view('admin.nilai.index', compact('nilai'));
    }

    // FORM CREATE
    public function create()
    {
        $siswa = Siswa::all();
        $mapel = MataPelajaran::all();
        $guru  = Guru::all();
        $tahun = TahunAjaran::all();

        return view('admin.nilai.create', compact('siswa','mapel','guru','tahun'));
    }

    // STORE
    public function store(Request $request)
    {
        $data = $request->validate([
            'siswa_id' => 'required|exists:siswa,id',
            'mata_pelajaran_id' => 'required|exists:mata_pelajaran,id',
            'tahun_ajaran_id' => 'required|exists:tahun_ajaran,id',
            'guru_id' => 'required|exists:guru,id',
            'nilai_harian' => 'nullable|numeric|min:0|max:100',
            'nilai_uts' => 'nullable|numeric|min:0|max:100',
            'nilai_uas' => 'nullable|numeric|min:0|max:100',
            'catatan' => 'nullable|string'
        ]);

        // hitung nilai akhir
        $data['nilai_akhir'] =
            ($data['nilai_harian'] ?? 0) * 0.2 +
            ($data['nilai_uts'] ?? 0) * 0.3 +
            ($data['nilai_uas'] ?? 0) * 0.5;

        // predikat
        $data['predikat'] = $this->getPredikat($data['nilai_akhir']);

        Nilai::create($data);

        return redirect()
            ->route('admin.nilai.index')
            ->with('success', 'Nilai berhasil ditambahkan');
    }

    // EDIT
    public function edit($id)
    {
        $nilai = Nilai::findOrFail($id);

        $siswa = Siswa::all();
        $mapel = MataPelajaran::all();
        $guru  = Guru::all();
        $tahun = TahunAjaran::all();

        return view('admin.nilai.edit', compact('nilai','siswa','mapel','guru','tahun'));
    }

    // UPDATE
    public function update(Request $request, $id)
    {
        $nilai = Nilai::findOrFail($id);

        $data = $request->validate([
            'nilai_harian' => 'nullable|numeric|min:0|max:100',
            'nilai_uts' => 'nullable|numeric|min:0|max:100',
            'nilai_uas' => 'nullable|numeric|min:0|max:100',
            'catatan' => 'nullable|string'
        ]);

        $data['nilai_akhir'] =
            ($data['nilai_harian'] ?? 0) * 0.2 +
            ($data['nilai_uts'] ?? 0) * 0.3 +
            ($data['nilai_uas'] ?? 0) * 0.5;

        $data['predikat'] = $this->getPredikat($data['nilai_akhir']);

        $nilai->update($data);

        return redirect()
            ->route('admin.nilai.index')
            ->with('success', 'Nilai berhasil diupdate');
    }

    // DELETE
    public function destroy($id)
    {
        Nilai::findOrFail($id)->delete();

        return back()->with('success', 'Nilai berhasil dihapus');
    }

    // HELPER PREDIKAT
    private function getPredikat($nilai)
    {
        return match (true) {
            $nilai >= 90 => 'A',
            $nilai >= 80 => 'B',
            $nilai >= 70 => 'C',
            $nilai >= 60 => 'D',
            default => 'E'
        };
    }
}
