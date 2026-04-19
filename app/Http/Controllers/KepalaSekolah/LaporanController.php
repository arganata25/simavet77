<?php

namespace App\Http\Controllers\KepalaSekolah;

use App\Http\Controllers\Controller;

class LaporanController extends Controller
{
    public function nilai()
    {
        // Logika mengambil rata-rata nilai per kelas
        return view('kepala_sekolah.laporan_nilai');
    }

    public function absensi()
    {
        // Logika mengambil persentase kehadiran siswa & guru
        return view('kepala_sekolah.laporan_absensi');
    }

    // FITUR BARU: Laporan PKL
    public function pkl()
    {
        // Logika mengambil sebaran data siswa PKL di berbagai Mitra DU/DI
        return view('kepala_sekolah.laporan_pkl');
    }
}