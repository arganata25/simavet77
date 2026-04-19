<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Guru;
use App\Models\Siswa;
use App\Models\TahunAjaran;
use Illuminate\Support\Facades\Hash;

class UserSeeders extends Seeder {
    public function run(): void {
        // 1. Buat Tahun Ajaran Default (Penting karena tabel Kelas/Siswa butuh ini)
       // 1. Buat Tahun Ajaran Default
$tahunAjaran = TahunAjaran::firstOrCreate([
    'nama' => '2025/2026', // Menggunakan kolom 'nama'
    'semester' => 'ganjil', // Huruf kecil sesuai enum di database
], [
    'is_aktif' => true, // Menggunakan 'is_aktif'
    'tanggal_mulai' => '2025-07-01', // Wajib diisi sesuai migrasi
    'tanggal_selesai' => '2025-12-31' // Wajib diisi sesuai migrasi
]);

        // 2. Administrator
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@smkveteran.sch.id',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        // 3. Kepala Sekolah
        User::create([
            'name' => 'Kepala Sekolah',
            'email' => 'kepsek@smkveteran.sch.id',
            'password' => Hash::make('password'),
            'role' => 'kepala_sekolah',
        ]);

        // 4. Guru (Menghubungkan User dengan tabel Guru)
        $guruUser = User::create([
            'name' => 'Budi Santoso',
            'email' => 'guru@smkveteran.sch.id',
            'password' => Hash::make('password'),
            'role' => 'guru',
        ]);

        Guru::create([
            'user_id' => $guruUser->id,
            'nip' => '1234567890',
            'nama' => 'Budi Santoso', // Sesuai kolom 'nama' di migrasi
            'jenis_kelamin' => 'L',
        ]);

        // 5. Siswa (PENTING: Harus buat data di tabel Siswa agar terbaca Dashboard)
        $siswaUser = User::create([
            'name' => 'Siswa Test',
            'email' => 'siswa@smkveteran.sch.id',
            'password' => Hash::make('password'),
            'role' => 'siswa',
        ]);

        Siswa::create([
            'user_id' => $siswaUser->id,
            'nis' => '10001',
            'nisn' => '000012345',
            'nama' => 'Siswa Test', // Sesuai kolom 'nama' di migrasi
            'jenis_kelamin' => 'L',
            'tahun_ajaran_id' => $tahunAjaran->id,
            // 'kelas_id' bisa dikosongkan dulu atau diisi jika sudah ada data kelas
        ]);
    }
}