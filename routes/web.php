<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// ADMIN
use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\GuruController;
use App\Http\Controllers\Admin\SiswaController;
use App\Http\Controllers\Admin\KelasController;
use App\Http\Controllers\Admin\MataPelajaranController;
use App\Http\Controllers\Admin\TahunAjaranController;
use App\Http\Controllers\Admin\JadwalPelajaranController;
use App\Http\Controllers\Admin\NilaiController as AdminNilai;
use App\Http\Controllers\Admin\AbsensiController as AdminAbsensi;
use App\Http\Controllers\Admin\PengumumanController;

// GURU
use App\Http\Controllers\Guru\DashboardController as GuruDashboard;
use App\Http\Controllers\Guru\NilaiController as GuruNilai;
use App\Http\Controllers\Guru\AbsensiController as GuruAbsensi;
use App\Http\Controllers\Guru\JadwalController;

// SISWA
use App\Http\Controllers\Siswa\DashboardController as SiswaDashboard;
use App\Http\Controllers\Siswa\NilaiController as SiswaNilai;
use App\Http\Controllers\Siswa\AbsensiController as SiswaAbsensi;
use App\Http\Controllers\Siswa\JadwalController as SiswaJadwal;
use App\Http\Controllers\Siswa\MentorController as SiswaMentor;
use App\Http\Controllers\Siswa\AlumniController as SiswaAlumni;
use App\Http\Controllers\Siswa\TugasController as SiswaTugas;
use App\Http\Controllers\Siswa\PklController as SiswaPkl;
use App\Http\Controllers\Siswa\PengumumanController as SiswaPengumuman;
use App\Http\Controllers\Siswa\AkademikController as SiswaAkademik;
// KEPALA SEKOLAH
use App\Http\Controllers\KepalaSekolah\DashboardController as KepsekDashboard;
use App\Http\Controllers\KepalaSekolah\LaporanController;


// ================= ROOT REDIRECT =================
// Route::get('/', function () {

//     if (!Auth::check()) {
//         return redirect()->route('login');
//     }

//     return match (Auth::user()->role) {
//         'admin' => redirect()->route('admin.dashboard'),
//         'guru' => redirect()->route('guru.dashboard'),
//         'siswa' => redirect()->route('siswa.dashboard'),
//         'kepala_sekolah' => redirect()->route('kepala_sekolah.dashboard'),
//         default => redirect()->route('login')
//     };

// });

Route::get('/', function () {

    if (!Auth::check()) {
        return redirect()->route('login');
    }

    $role = Auth::user()->role ?? null;

    return match ($role) {
        'admin' => redirect()->route('admin.dashboard'),
        'guru' => redirect()->route('guru.dashboard'),
        'siswa' => redirect()->route('siswa.dashboard'),
        'kepala_sekolah' => redirect()->route('kepala_sekolah.dashboard'),
        default => redirect()->route('login')
    };

});


// ================= ADMIN =================
Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth', 'role:admin'])
    ->group(function () {

        Route::get('/dashboard', [AdminDashboard::class, 'index'])->name('dashboard');

        Route::resource('users', UserController::class);
        Route::resource('guru', GuruController::class);
        Route::resource('siswa', SiswaController::class);
        Route::resource('kelas', KelasController::class);
        Route::resource('mata-pelajaran', MataPelajaranController::class);
        Route::resource('tahun-ajaran', TahunAjaranController::class);
        Route::resource('jadwal-pelajaran', JadwalPelajaranController::class);
        Route::resource('nilai', AdminNilai::class);
        Route::resource('absensi', AdminAbsensi::class);
        Route::resource('pengumuman', PengumumanController::class);

    });


// ================= GURU =================
Route::prefix('guru')
    ->name('guru.')
    ->middleware(['auth', 'role:guru'])
    ->group(function () {

        Route::get('/dashboard', [GuruDashboard::class, 'index'])->name('dashboard');

        Route::resource('nilai', GuruNilai::class);
        Route::resource('absensi', GuruAbsensi::class);

        Route::get('jadwal', [JadwalController::class, 'index'])->name('jadwal');

    });


// ================= SISWA =================
Route::prefix('siswa')
    ->name('siswa.')
    ->middleware(['auth', 'role:siswa'])
    ->group(function () {

       // Dashboard
        Route::get('/dashboard', [SiswaDashboard::class, 'index'])->name('dashboard');

        // Menu utama
        Route::get('/akademik', [SiswaAkademik::class, 'index'])->name('akademik');
        Route::get('/absensi', [SiswaAbsensi::class, 'index'])->name('absensi');
        Route::get('/jadwal', [SiswaJadwal::class, 'index'])->name('jadwal');
        Route::get('/nilai', [SiswaNilai::class, 'index'])->name('nilai');

        // Tambahan fitur
        Route::get('/mentor', [SiswaMentor::class, 'index'])->name('mentor');
        Route::get('/alumni', [SiswaAlumni::class, 'index'])->name('alumni');
        Route::get('/tugas', [SiswaTugas::class, 'index'])->name('tugas');
        Route::get('/pkl', [SiswaPkl::class, 'index'])->name('pkl');
        Route::get('/pengumuman', [SiswaPengumuman::class, 'index'])->name('pengumuman');

    });


// ================= KEPALA SEKOLAH =================
Route::prefix('kepala-sekolah')
    ->name('kepala_sekolah.')
    ->middleware(['auth', 'role:kepala_sekolah'])
    ->group(function () {

        Route::get('/dashboard', [KepsekDashboard::class, 'index'])->name('dashboard');

        Route::get('/laporan-nilai', [LaporanController::class, 'nilai'])->name('laporan.nilai');
        Route::get('/laporan-absensi', [LaporanController::class, 'absensi'])->name('laporan.absensi');

    });


require __DIR__.'/auth.php';
