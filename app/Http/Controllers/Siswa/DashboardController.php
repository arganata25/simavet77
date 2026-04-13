<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
       $user = Auth::user();
$siswa = $user->siswa;

if (!$siswa) {
    return view('siswa.dashboard', [
        'siswa' => null,
        'dokumen' => [
            'ktp' => false,
            'kk' => false,
            'nisn' => false,
        ],
        'pengumuman' => \App\Models\Pengumuman::latest()->take(5)->get()
    ]);
}

$dokumen = $siswa->getDokumenStatus();

return view('siswa.dashboard', compact('siswa','dokumen'));
    }

public function akademik()
{
    $user = Auth::user();
    $siswa = $user->siswa;

    $nilai = $siswa->nilai()->with(['mataPelajaran','guru'])->get();

    // statistik
    $rata = round($nilai->avg('nilai_akhir'), 2);
    $totalMapel = $nilai->count();
    $jumlahA = $nilai->where('predikat', 'A')->count();

    return view('siswa.akademik', compact(
        'nilai',
        'rata',
        'totalMapel',
        'jumlahA'
    ));
}
    public function absensi()
    {
        return view('siswa.absensi');
    }

    public function jadwal()
    {
        return view('siswa.jadwal');
    }

    public function mentor()
    {
        return view('siswa.mentor');
    }

    public function alumni()
    {
        return view('siswa.alumni');
    }

    public function tugas()
    {
        return view('siswa.tugas');
    }

    public function nilai()
    {
        return view('siswa.nilai');
    }

    public function pkl()
    {
        return view('siswa.pkl');
    }

    public function pengumuman()
    {
        return view('siswa.pengumuman');
    }
}