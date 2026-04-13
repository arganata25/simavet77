<?php

namespace App\Http\Controllers\KepalaSekolah;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Nilai;
use App\Models\Absensi;

class DashboardController extends Controller
{
    public function index()
    {
        return view('kepala_sekolah.dashboard', [
            'totalSiswa' => Siswa::count(),
            'totalGuru' => Guru::count(),
            'totalKelas' => Kelas::count(),
            'rataNilai' => round(Nilai::avg('nilai_akhir'), 2),
            'totalAbsensiHariIni' => Absensi::whereDate('tanggal', now())->count()
        ]);
    }
}