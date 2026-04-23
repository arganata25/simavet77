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
use App\Http\Controllers\Admin\PengumumanController as AdminPengumuman;
use App\Http\Controllers\Admin\JurusanController; 
use App\Http\Controllers\Admin\DudiController; 
use App\Http\Controllers\Admin\KepalaSekolahController;
use App\Http\Controllers\Admin\NilaiController;
use App\Http\Controllers\Admin\PengumumanController;
// GURU
use App\Http\Controllers\Guru\DashboardController as GuruDashboard;
use App\Http\Controllers\Guru\NilaiController as GuruNilai;
use App\Http\Controllers\Guru\AbsensiController as GuruAbsensi;
use App\Http\Controllers\Guru\JadwalController as GuruJadwal;
use App\Http\Controllers\Guru\MateriController as GuruMateri; 
use App\Http\Controllers\Guru\TugasController as GuruTugas; 

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
use App\Http\Controllers\Siswa\MateriController as SiswaMateri; 
use App\Http\Controllers\Siswa\RaportController as SiswaRaport; 

// KEPALA SEKOLAH
use App\Http\Controllers\KepalaSekolah\DashboardController as KepsekDashboard;
use App\Http\Controllers\KepalaSekolah\LaporanController;
use App\Http\Controllers\KepalaSekolah\StatistikController as KepsekStatistik; 


// ================= ROOT REDIRECT =================
Route::get('/', function () {
    if (!Auth::check()) {
        return redirect()->route('login');
    }

    return match (Auth::user()->role) {
        'admin'          => redirect()->route('admin.dashboard'),
        'guru'           => redirect()->route('guru.dashboard'),
        'siswa'          => redirect()->route('siswa.dashboard'),
        'kepala_sekolah' => redirect()->route('kepala_sekolah.dashboard'),
        default          => abort(403, 'Role tidak dikenali.'),
    };
});


// ================= ADMIN =================
Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth', 'role:admin'])
    ->group(function () {

        Route::get('/dashboard', [AdminDashboard::class, 'index'])->name('dashboard');

        // ================= MASTER DATA =================
        Route::resource('users', UserController::class);
        Route::resource('guru', GuruController::class);
        Route::resource('siswa', SiswaController::class);
        Route::resource('kelas', KelasController::class);
        Route::resource('kepala_sekolah', KepalaSekolahController::class);
        Route::resource('jurusan', JurusanController::class); 
        Route::resource('mata-pelajaran', MataPelajaranController::class);
        Route::resource('tahun-ajaran', TahunAjaranController::class);

        // ================= AKADEMIK =================
        Route::resource('nilai', AdminNilai::class);
        Route::resource('absensi', AdminAbsensi::class);

        // ================= JADWAL (WITH TRASH) =================
        Route::get('jadwal-pelajaran/trash', [JadwalPelajaranController::class, 'trash'])->name('jadwal-pelajaran.trash');
        Route::post('jadwal-pelajaran/{id}/restore', [JadwalPelajaranController::class, 'restore'])->name('jadwal-pelajaran.restore');
        Route::delete('jadwal-pelajaran/{id}/force-delete', [JadwalPelajaranController::class, 'forceDelete'])->name('jadwal-pelajaran.forceDelete');
        Route::resource('jadwal-pelajaran', JadwalPelajaranController::class);

        // ================= LAINNYA =================
        Route::resource('pengumuman', PengumumanController::class);
        Route::resource('mitra-dudi', DudiController::class);
});


// ================= GURU =================
Route::prefix('guru')
    ->name('guru.')
    ->middleware(['auth', 'role:guru'])
    ->group(function () {
        Route::get('/dashboard', [GuruDashboard::class, 'index'])->name('dashboard');
        
        // Akademik
        Route::get('/jadwal', [GuruJadwal::class, 'index'])->name('jadwal');
        Route::resource('absensi', GuruAbsensi::class);
        Route::resource('nilai', GuruNilai::class);
        
        // Pembelajaran
        Route::resource('materi', GuruMateri::class); 
        Route::resource('tugas', GuruTugas::class); 
    });


// ================= SISWA =================
Route::prefix('siswa')
    ->name('siswa.')
    ->middleware(['auth', 'role:siswa'])
    ->group(function () {
        Route::get('/dashboard', [SiswaDashboard::class, 'index'])->name('dashboard');

        // Akademik Utama
        Route::get('/akademik', [SiswaAkademik::class, 'index'])->name('akademik');
        Route::get('/absensi', [SiswaAbsensi::class, 'index'])->name('absensi');
        Route::get('/jadwal', [SiswaJadwal::class, 'index'])->name('jadwal');
        Route::get('/nilai', [SiswaNilai::class, 'index'])->name('nilai');
        Route::get('/raport', [SiswaRaport::class, 'index'])->name('raport'); 

        // Pembelajaran
        Route::get('/materi', [SiswaMateri::class, 'index'])->name('materi'); 
        Route::get('/tugas', [SiswaTugas::class, 'index'])->name('tugas');
        Route::post('/tugas/kumpulkan/{id}', [SiswaTugas::class, 'submit'])->name('tugas.submit'); 

        // Fitur Tambahan
        Route::get('/mentor', [SiswaMentor::class, 'index'])->name('mentor');
        Route::get('/alumni', [SiswaAlumni::class, 'index'])->name('alumni');
        Route::get('/pkl', [SiswaPkl::class, 'index'])->name('pkl');
        Route::get('/pengumuman', [SiswaPengumuman::class, 'index'])->name('pengumuman');
    });


// ================= KEPALA SEKOLAH =================
Route::prefix('kepala-sekolah')
    ->name('kepala_sekolah.')
    ->middleware(['auth', 'role:kepala_sekolah'])
    ->group(function () {
        Route::get('/dashboard', [KepsekDashboard::class, 'index'])->name('dashboard');
        
        // Analitik & Statistik
        Route::get('/statistik', [KepsekStatistik::class, 'index'])->name('statistik'); 
        
        // Laporan
        Route::get('/laporan-nilai', [LaporanController::class, 'nilai'])->name('laporan.nilai');
        Route::get('/laporan-absensi', [LaporanController::class, 'absensi'])->name('laporan.absensi');
        Route::get('/laporan-pkl', [LaporanController::class, 'pkl'])->name('laporan.pkl'); 
    });


// Matikan fungsi register publik (Best Practice untuk aplikasi sistem internal)
Route::get('/register', function () {
    abort(404);
});

require __DIR__.'/auth.php';