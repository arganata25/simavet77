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
        $stasts = [
            'total_siswa' => Siswa::count(),
            'total_guru' => Guru::count(),
            'total_kelas' => Kelas::count(),
            'rata_nilai' => round(Nilai::avg('nilai_akhir'), 2),
            'absensi_hari_ini' => Absensi::whereDate('tanggal', now())->count()
        ];
        return view('kepala_sekolah.dashboard', compact('stasts'));
    }
}