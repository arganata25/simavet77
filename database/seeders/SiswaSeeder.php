<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Siswa;
use Illuminate\Support\Facades\Hash;

class SiswaSeeder extends Seeder
{
    public function run(): void
{
    $this->call([
        UserSeeders::class,
        SiswaSeeder::class,
    ]);
                 // Pastikan UserSeeders dijalankan terlebih dahulu
    for ($i = 1; $i <= 50; $i++) {

        $user = User::create([
            'name' => 'Siswa ' . $i,
            'email' => 'siswa' . $i . '@mail.com',
            'password' => Hash::make('12345678'),
            'role' => 'siswa',
            'is_active' => true,
        ]);

        Siswa::create([
            'user_id' => $user->id,
            'kelas_id' => 1, // pastikan ada di tabel kelas
            'nisn' => '20240' . str_pad($i, 3, '0', STR_PAD_LEFT),
            'nama_lengkap' => 'Siswa ' . $i,
            'jenis_kelamin' => $i % 2 == 0 ? 'Laki-laki' : 'Perempuan',
            'tanggal_lahir' => '2007-01-01',
            'alamat' => 'Tulungagung',
            'no_hp_siswa' => '08123' . rand(1000000,9999999),
            'no_hp_ortu' => '08223' . rand(1000000,9999999),
            'status' => 'aktif',
        ]);
    }
}
}